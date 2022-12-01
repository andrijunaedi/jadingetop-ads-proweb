<?php
class Device
{
    public $table = "devices";
    public $db;

    public function __construct()
    {
        require(dirname(__DIR__) . '/config/database.php');
        $this->db = $conn;
    }

    function all_data()
    {
        $data = [];
        $sql = "SELECT slug, nama, lokasi FROM $this->table";
        $result = $this->db->query($sql);

        try {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                return "Devices tidak ditemukan";
            }
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            $this->db->close();
        }
    }
}
