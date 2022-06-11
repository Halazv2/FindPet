<?php

class NotificationModel
{
    protected $db;
    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->DB;
    }
    public function rejectVolunteer($reject, $user_id)
    {
        $sql = "UPDATE volunteer SET status = :status WHERE user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':status', $reject);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }
    public function acceptedOrRejectVolunteer($accpted, $user_id, $message)
    {
        if ($this->checkUserOnline($user_id) == true) {
            $sql = "UPDATE volunteer SET status = :status WHERE user_id = :user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':status', $accpted);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
        } else {
            if ($this->checkifUserExist($user_id) == true) {
                $sql = "UPDATE notifications SET status = :status WHERE user_id = :user_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':status', $accpted);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();
            } else {
                $sql = "INSERT INTO notifications (user_id, status,message) VALUES (:user_id, :status, :message)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':status', $accpted);
                $stmt->bindParam(':message', $message);
                $stmt->execute();
            }
            // $sql = "INSERT INTO notifications (user_id, status,message) VALUES (:user_id, :status, :message)";
            // $stmt = $this->db->prepare($sql);
            // $stmt->bindParam(':user_id', $user_id);
            // $stmt->bindParam(':status', $accpted);
            // $stmt->bindParam(':message', $message);
            // $stmt->execute();
        }
    }
    public function checkUserOnline($user_id)
    {
        $sql = "SELECT * FROM users WHERE id = :user_id AND status = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function checkifUserExist($user_id)
    {
        $sql = "SELECT * FROM notifications WHERE user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
