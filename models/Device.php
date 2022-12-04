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

    function getAll()
    {
        $data = [];
        $sql = "SELECT id, slug, nama, lokasi FROM $this->table";
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

    /**
     * Insert data bulk detail devices
     */
    function insertBulkKontenDevices($konten, $devices)
    {
        $sql = "INSERT INTO konten_devices (konten, device) VALUES ";
        $values = [];
        foreach ($devices as $device) {
            $values[] = "($konten, $device)";
        }
        $sql .= implode(',', $values);
        $stmt = $this->db->prepare($sql);

        try {
            $this->db->begin_transaction();
            $stmt->execute();
            $this->db->commit();

            return [
                'status' => true,
                'message' => 'Berhasil menambahkan konten devices'
            ];
        } catch (\Throwable $th) {
            $this->db->rollback();
            throw $th;
        } finally {
            $this->db->close();
        }
    }
}
