<?php
require_once(dirname(__DIR__) . '/models/Device.php');
require_once(dirname(__DIR__) . '/models/Users.php');

class Billings
{
    public $table = "billings";
    public $db;
    private $userId;

    public function __construct($userId = null)
    {
        # Call database connection
        require(dirname(__DIR__) . '/config/database.php');
        $this->db = $conn;
        $this->userId = $userId;
    }

    public function close()
    {
        $this->db->close();
    }


    /**
     Get all data billing

     return array
     */
    function getAll()
    {
        $data = [];
        $sql = "SELECT id, nominal, status, created_at FROM $this->table WHERE user = $this->userId";
        $result = $this->db->query($sql);

        try {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                return "Billing tidak ditemukan";
            }
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            $this->db->close();
        }
    }

    /**
     Get detail billing by id
     */
    function getById($id)
    {
        $sql = "SELECT id, nominal, status, created_at FROM $this->table WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);

        try {
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Exception $error) {
            return [
                'status' => false,
                'message' => $error->getMessage()
            ];
        } finally {
            $stmt->close();
            // $this->db->close();
        }
    }

    // Get stats billing by status
    function getStatsByStatus()
    {
        $data = [];
        $sql = "SELECT status, count(*) count FROM $this->table WHERE user = $this->userId GROUP BY status";
        $result = $this->db->query($sql);

        try {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[$row['status']] = $row['count'];
                }
                var_dump($data);
                return $data;
            } else {
                return [
                    'pending' => 0,
                    'success' => 0,
                    'cancel' => 0
                ];
            }
        } catch (\Exception $error) {
            return [
                'status' => false,
                'message' => $error->getMessage()
            ];
        } finally {
            $result->close();
            // $this->db->close();
        }
    }

    // Create function topup
    function topup($nominal)
    {
        $sql = "INSERT INTO $this->table (user, nominal, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $status = "pending";
        $stmt->bind_param("iisss", $this->userId, $nominal, $status, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));

        try {
            $stmt->execute();
            return [
                'status' => true,
                'id' => $stmt->insert_id,
                'message' => 'Topup berhasil'
            ];
        } catch (\Exception $error) {
            return [
                'status' => false,
                'message' => $error->getMessage()
            ];
        } finally {
            $stmt->close();
            // $this->db->close();
        }
    }

    // Create method for get user current balance related billing id
    function getCurrentBalance($id)
    {
        $sql = "SELECT user, nominal, balance FROM billings b JOIN users u on u.id = b.user WHERE b.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);

        try {
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Exception $error) {
            return [
                'status' => false,
                'message' => $error->getMessage()
            ];
        } finally {
            $stmt->close();
            // $this->db->close();
        }
    }

    // Create method confirm payment
    function confirmPayment($id)
    {
        $sql = "UPDATE $this->table SET status = ?, updated_at = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $status = "success";
        $updated_at = date('Y-m-d H:i:s');
        $stmt->bind_param("sss", $status, $updated_at, $id);

        try {
            $this->db->begin_transaction();
            $stmt->execute();

            // Update current balance in user related to this billing
            $currentBalance = $this->getCurrentBalance($id);
            $balance = $currentBalance['balance'] + $currentBalance['nominal'];
            $Users = new Users($currentBalance['user']);

            $Users->updateBalance($currentBalance['user'], $balance);

            $this->db->commit();
            return [
                'status' => true,
                'message' => 'Konfirmasi pembayaran berhasil'
            ];
        } catch (\Exception $error) {
            $this->db->rollback();
            return [
                'status' => false,
                'message' => $error->getMessage()
            ];
        } finally {
            $stmt->close();
            $this->db->close();
        }
    }
}
