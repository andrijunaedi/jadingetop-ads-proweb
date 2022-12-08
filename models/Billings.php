<?php
require_once(dirname(__DIR__) . '/models/Device.php');

class Billings
{
    public $table = "billings";
    public $db;

    public function __construct()
    {
        # Call database connection
        require(dirname(__DIR__) . '/config/database.php');
        $this->db = $conn;
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
        $sql = "SELECT id, nominal, status, created_at FROM $this->table";
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
}
