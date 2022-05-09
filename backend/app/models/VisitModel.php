<?php
require_once APPROOT . '/config/config.php';
class VisitModel {
    protected $db;
    public function __construct() {
        $conn = new Database();
        $this->db = $conn->DB;
    }
    public function ContactUs($name, $email, $message) {
        $sql = "INSERT INTO contactus (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
        return true;
    }
}