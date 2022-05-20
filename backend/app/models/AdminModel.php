<?php
require_once APPROOT . '/config/config.php';

class AdminModel
{
    protected $db;
    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->DB;
    }

    public function login($email, $password)
    {
        $request = "SELECT * FROM admin WHERE email = :email";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($admin) {
            if ($admin['password'] == $password) {
                echo json_encode($admin);
            } else {
                echo json_encode(['message' => 'Invalid password']);
            }
        } else {
            echo json_encode(['message' => 'Admin not found']);
        }
    }
}
