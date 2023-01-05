<?php
require_once(dirname(__DIR__) . '/models/Device.php');

class Billings
{
    public $table = "billings";
    public $db;
    private $userId;

    public function __construct($userId)
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
}
