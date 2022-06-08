<?php

class NotificationModel 
{
    public function rejectVolunteer($data,$id)
    {
        $sql = "INSERT into notifications (titel, status, message, user_id) values (:titel, :status, :message, :user_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':titel', $data['titel']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':message', $data['message']);
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();
    }
}
