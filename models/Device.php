<?php
class Device
{
    public $table = "devices";
    public $db;
    private $userId;

    public function __construct($userId = null)
    {
        require(dirname(__DIR__) . '/config/database.php');
        $this->db = $conn;
        $this->userId = $userId;
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

    // Get all devices by user
    function getAllByUser()
    {
        $data = [];
        $sql = "SELECT id, slug, nama, lokasi, orientasi FROM $this->table WHERE user = $this->userId";
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

    // Get device by id
    function getById($id)
    {
        $sql = "SELECT id, slug, nama, lokasi, orientasi FROM $this->table WHERE id = $id";
        $result = $this->db->query($sql);

        try {
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return "Device tidak ditemukan";
            }
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            $this->db->close();
        }
    }

    function slugify($string)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }

    // create new device
    function create($nama, $lokasi, $orientasi)
    {

        $sql = "INSERT INTO $this->table (slug, nama, lokasi, orientasi, user) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $slug = $this->slugify($nama);

        $stmt->bind_param("ssssi", $slug, $nama, $lokasi, $orientasi, $this->userId);


        try {
            $this->db->begin_transaction();
            $stmt->execute();
            $this->db->commit();

            return [
                'status' => true,
                'message' => 'Berhasil menambahkan device'
            ];
        } catch (\Throwable $th) {
            $this->db->rollback();
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

    // Update device
    function update($id, $nama, $lokasi, $orientasi)
    {
        $sql = "UPDATE $this->table SET nama = ?, lokasi = ?, orientasi = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        $stmt->bind_param("sssi", $nama, $lokasi, $orientasi, $id);

        try {
            $this->db->begin_transaction();
            $stmt->execute();
            $this->db->commit();

            return [
                'status' => true,
                'message' => 'Berhasil mengubah device'
            ];
        } catch (\Throwable $th) {
            $this->db->rollback();
            throw $th;
        } finally {
            $this->db->close();
        }
    }

    // Delete device
    function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        $stmt->bind_param("i", $id);

        try {
            $this->db->begin_transaction();
            $stmt->execute();
            $this->db->commit();

            return [
                'status' => true,
                'message' => 'Berhasil menghapus device'
            ];
        } catch (\Throwable $th) {
            $this->db->rollback();
            throw $th;
        } finally {
            $this->db->close();
        }
    }
}
