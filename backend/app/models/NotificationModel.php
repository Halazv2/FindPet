<?php

class NotificationModel 
{
    protected $db;
    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->DB;
    }
    public function rejectVolunteer($reject,$user_id)
    {
        $sql = "UPDATE volunteer SET status = :status WHERE user_id = :user_id";
        $stmt = $this ->db->prepare($sql);
        $stmt->bindParam(':status', $reject);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }
    public function acceptedVolunteer($accpted,$user_id)
    {
        $sql = "UPDATE volunteer SET status = :status WHERE user_id = :user_id";
        $stmt = $this ->db->prepare($sql);
        $stmt->bindParam(':status', $accpted);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }
}
