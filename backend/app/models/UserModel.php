<?php
require_once APPROOT . '/config/config.php';
class UserModel
{
    protected $db;
    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->DB;
    }
    public function register($FirstName, $LastName, $Email, $Password)
    {
        $request = "INSERT  INTO users (FirstName, LastName, Email, Password) VALUES (:FirstName, :LastName, :Email, :Password)";
        //check if user is already registered
        $check = "SELECT * FROM users WHERE Email = :Email";
        $stmt = $this->db->prepare($check);
        $stmt->bindParam(':Email', $Email);
        $stmt->execute();   
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            echo json_encode(['message' => 'This email already exists, try another one']);
        } else {
            $stmt = $this->db->prepare($request);
            $stmt->bindParam(':FirstName', $FirstName);
            $stmt->bindParam(':LastName', $LastName);
            $stmt->bindParam(':Email', $Email);
            //hash password
            $stmt->bindParam(':Password', password_hash($Password, PASSWORD_DEFAULT));
            // $stmt->bindParam(':Password', $Password);
            $stmt->execute();
            return true;
        }
    }
    public function login($Email, $Password)
    {
        $request = "SELECT * FROM users WHERE Email = :Email";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':Email', $Email);
        $stmt->execute();
        //check if user is registered
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            //check if password is correct
            if (password_verify($Password, $user['Password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['FirstName'];
                $_SESSION['user_email'] = $user['Email'];
                return true;
            } else {
                //if password is incorrect
                echo json_encode(['message' => 'Invalid password']);
            }
            //if user is not registered
        } else {
            echo json_encode(['message' => 'Invalid email']);
        }
    }

}
