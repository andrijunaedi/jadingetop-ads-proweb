<?php
require_once(dirname(__DIR__) . '/models/Device.php');

class Konten
{
    public $table = "konten";
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
     Get all data from table

     return array
     */
    function getAll()
    {
        $data = [];
        $sql = "SELECT id, judul, konten, thumbnail, orientasi, durasi FROM $this->table WHERE user = $this->userId";
        $result = $this->db->query($sql);

        try {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                return "Konten tidak ditemukan";
            }
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            $this->db->close();
        }
    }

    /**
     Get all data from table

     return array
     */
    function getAllWithDevices()
    {
        $data = [];
        // Mengambil data konten dan devices nya (menggunakan left join)
        $sql = "SELECT k.id, judul, thumbnail, k.orientasi, durasi, d.nama device_name, lokasi device_lokasi
                FROM $this->table k
                LEFT JOIN konten_devices kd on k.id = kd.konten
                LEFT JOIN devices d on d.id = kd.device 
                WHERE k.user = $this->userId";
        $result = $this->db->query($sql);

        try {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Pengecekan jika konten belum ada di array data
                    if (!isset($data[$row['id']])) {
                        $data[$row['id']] = [
                            'id' => $row['id'],
                            'thumbnail' => $row['thumbnail'],
                            'judul' => $row['judul'],
                            'orientasi' => $row['orientasi'],
                            'devices' => [],
                        ];
                    }

                    // Memasukkan data devices kedalam konten dengan id yg sama
                    $data[$row['id']]['devices'][] = "{$row['device_name']}";
                }

                return $data;
            } else {
                return "Konten tidak ditemukan";
            }
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            // Setelah semua query dijalankan, akhiri koneksi database
            $this->db->close();
        }
    }

    /**
     Get detail konten by id
     */
    function getById($id)
    {
        $sql = "SELECT id, judul, konten, thumbnail, orientasi, durasi FROM $this->table WHERE id = ? AND user = $this->userId";
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

    /**
    Insert data to table with transaction

    Params: 
    - $judul(string): judul konten
    - $konten(string): konten URL
    - $thumbnail(string): thumbnail URL
    - $orientasi(portrait|landscape): orientasi konten
    - $durasi(int): durasi konten

    Return:
    - status (boolean)
    - message (string)
     */
    function insert($judul, $konten, $thumbnail, $orientasi, $durasi, $devices = [])
    {
        $Device = new Device();

        $sql = "INSERT INTO $this->table (judul, konten, thumbnail, orientasi, durasi, user) VALUES (?, ?, ?, ?, ?, $this->userId)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssss", $judul, $konten, $thumbnail, $orientasi, $durasi);

        try {
            $this->db->begin_transaction();
            $stmt->execute();

            // If devices not empty array, insert bulk konten_devices
            if (!empty($devices)) {
                $konten_id = $this->db->insert_id;
                $this->db->commit();
                $devices = $Device->insertBulkKontenDevices($konten_id, $devices);

                if (!$devices['status']) {
                    throw new Exception($devices['message']);
                }
            } else {
                $this->db->commit();
            }

            return [
                'status' => true,
                'message' => 'Data berhasil ditambahkan'
            ];
        } catch (\Throwable $th) {
            $this->db->rollback();
            throw $th;
        } finally {
            $stmt->close();
            $this->db->close();
        }
    }

    /**
    Update data to table with transaction

    Params: 
    - $id(int): id of data
    - $judul(string): judul konten
    - $konten(string): konten URL
    - $thumbnail(string): thumbnail URL
    - $orientasi(portrait|landscape): orientasi konten
    - $durasi(int): durasi konten

    Return:
    - status (boolean)
    - message (string)
     */
    function update($id, $judul, $konten, $thumbnail, $orientasi, $durasi)
    {
        $sql = "UPDATE $this->table SET judul = ?, konten = ?, thumbnail = ?, orientasi = ?, durasi = ? WHERE id = ? AND user = $this->userId";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssi", $judul, $konten, $thumbnail, $orientasi, $durasi, $id);

        try {
            $this->db->begin_transaction();
            $stmt->execute();
            $this->db->commit();
            return [
                'status' => true,
                'message' => 'Data berhasil diubah'
            ];
        } catch (\Throwable $th) {
            $this->db->rollback();
            throw $th;
        } finally {
            $stmt->close();
            $this->db->close();
        }
    }

    /**
     Delete data from table
     Params:
     - $id(int): id of data
      
     Return:
     - status (boolean)
     - message (string)
     */
    function delete($id)
    {
        // Query untuk menghapus data konten berdasarkan id
        $sql = "DELETE FROM $this->table WHERE id = ? AND user = $this->userId";
        $stmt = $this->db->prepare($sql);
        // Masukan parameter id kedalam query
        $stmt->bind_param("i", $id);

        try {
            // Jalankan query
            $stmt->execute();
            return [
                'status' => true,
                'message' => 'Data berhasil dihapus'
            ];
        } catch (\Throwable $th) {
            // Jika terjadi error, tampilkan pesan error
            throw $th;
        } finally {
            // Setelah semua query dijalankan, akhiri koneksi database
            $stmt->close();
            $this->db->close();
        }
    }

    /**
     * Get all konten_devices by konten id
     */
    function getDevicesById($konten)
    {
        $data = [];
        $sql = "SELECT * FROM konten_devices kd JOIN devices ON kd.device = devices.id WHERE kd.konten = $konten";
        $result = $this->db->query($sql);

        try {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = [
                        'device' => $row['device'],
                        'nama' => $row['nama'],
                        'lokasi' => $row['lokasi'],
                    ];
                }
                return $data;
            } else {
                return [];
            }
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            // $this->db->close();
        }
    }
}
