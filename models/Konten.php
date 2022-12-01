<?php
class Konten
{
    public $table = "konten";
    public $db;

    public function __construct()
    {
        # Call database connection
        require(dirname(__DIR__) . '/config/database.php');
        $this->db = $conn;
    }

    /**
     Get all data from table

     return array
     */
    function all_data()
    {
        $data = [];
        $sql = "SELECT id, judul, konten, thumbnail, orientasi, durasi FROM $this->table";
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
    function insert($judul, $konten, $thumbnail, $orientasi, $durasi)
    {
        $sql = "INSERT INTO $this->table (judul, konten, thumbnail, orientasi, durasi) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssss", $judul, $konten, $thumbnail, $orientasi, $durasi);

        try {
            $this->db->begin_transaction();
            $stmt->execute();
            $this->db->commit();
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
        $sql = "UPDATE $this->table SET judul = ?, konten = ?, thumbnail = ?, orientasi = ?, durasi = ? WHERE id = ?";
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
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);

        try {
            $stmt->execute();
            return [
                'status' => true,
                'message' => 'Data berhasil dihapus'
            ];
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            $stmt->close();
            $this->db->close();
        }
    }
}
