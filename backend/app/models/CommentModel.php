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
    public function getComments($post_id)
    {
        $request = "SELECT comments.*, users.FirstName, users.LastName, users.ProfilePic FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comments.post_id = :post_id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }
    public function deleteComment($comment_id)
    {
        $request = "DELETE FROM comments WHERE id = :comment_id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':comment_id', $comment_id);
        $stmt->execute();
    }
    public function updateComment($comment, $comment_id)
    {
        $request = "UPDATE comments SET comment = :comment WHERE id = :comment_id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':comment_id', $comment_id);
        $stmt->execute();
    }
    public function countComment($post_id)
    {
        $request = "SELECT COUNT(id) as count FROM comments WHERE post_id = :post_id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }
}
