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
        //if user is online then send notification 
        if ($this->checkUserOnline($user_id) == true) {
            //update volunteer status and message to accepted or rejected
            $sql = "UPDATE volunteer SET status = :status message = :message WHERE user_id = :user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':status', $accpted);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':message', $message);
            if ($this->checkifUserExist($user_id) == true) {
                $sql = "UPDATE notifications SET status = :status WHERE user_id = :user_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':status', $accpted);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();
            } else {
                $this->insertNotification($user_id, $message, $accpted);
            }
        } else {

            if ($this->checkifUserExist($user_id) == true) {
                $sql = "UPDATE notifications SET status = :status WHERE user_id = :user_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':status', $accpted);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();
            } else {
                $this->insertNotification($user_id, $message, $accpted);
            }
        }
    }


    public function insertNotification($user_id, $message, $accpted)
    {
        $sql = "INSERT INTO notifications (user_id, status,message) VALUES (:user_id, :status, :message)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':status', $accpted);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
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

    public function getNotification($user_id)
    {

        $sql = "SELECT * FROM notifications WHERE user_id = :user_id ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
