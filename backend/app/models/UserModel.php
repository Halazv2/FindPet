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
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':FirstName', $FirstName);
        $stmt->bindParam(':LastName', $LastName);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Password', $Password);
        return $stmt->execute();
    }
}
