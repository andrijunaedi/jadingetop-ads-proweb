<?php
class Users
{
    private $secret = "Jadingetop2023";
    public $table = "devices";
    public $db;

    public function __construct()
    {
        require(dirname(__DIR__) . '/config/database.php');
        $this->db = $conn;
    }

    // Create register user with hash password
    function register($username, $email, $password, $role = "konsumen")
    {
        $password = hash("sha256", "$password-$this->secret");
        $sql = "INSERT INTO users (username, email, password, role, balance) VALUES (?, ?, ?, ?, 0)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssss', $username, $email, $password, $role);

        try {
            $this->db->begin_transaction();
            $stmt->execute();
            $this->db->commit();

            return [
                'status' => true,
                'message' => 'Berhasil mendaftar'
            ];
        } catch (\Throwable $th) {
            $this->db->rollback();
            throw $th;
        } finally {
            $this->db->close();
        }
    }

    // Create login email and password with hash password
    function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        try {
            if (hash("sha256", "$password-$this->secret") == $user['password']) {
                return [
                    'status' => true,
                    'message' => 'Berhasil login',
                    'data' => $user
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Email atau password salah'
                ];
            }
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            $this->db->close();
        }
    }

    // Get user data by id
    function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        try {
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            $this->db->close();
        }
    }

    // Get current balance by user id
    function getBalance($id)
    {
        $sql = "SELECT balance FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        try {
            return $user['balance'];
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            $this->db->close();
        }
    }
}
