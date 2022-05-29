<?php
require_once APPROOT . '/config/config.php';

class CommentModel
{
    protected $db;
    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->DB;
    }
    public function addComment($comment, $user_id, $post_id)
    {
        $request = "INSERT INTO comments (comment, user_id, post_id) VALUES (:comment, :user_id, :post_id)";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
    }
}
