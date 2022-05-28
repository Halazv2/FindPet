<?php
require_once APPROOT . '/config/config.php';

class FeedModel
{
    protected $db;
    public function __construct()
    {
        $conn = new Database();
        // var_dump($conn);
        // exit;
        $this->db = $conn->DB;
    }
    public function getFeed()
    {
        $request = "SELECT * FROM posts";
        $stmt = $this->db->prepare($request);
        $stmt->execute();
        $feed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $feed;
    }
    public function lastInsertId()
    {
        $request = "SELECT * FROM posts ORDER BY id DESC LIMIT 1";
        $stmt = $this->db->prepare($request);
        $stmt->execute();
        $feed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $feed;
    }
    public function getPost($id)
    {
        $request = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $feed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $feed;
    }

    public function addPost($Title, $PetType, $Description, $PostType, $Image, $UserID)
    {
        $request = "INSERT  INTO posts (`UserID`, `Title`, `PetType`, `Description`, `PostType`, `Image`) VALUES (:UserID,:Title,:PetType, :Description, :PostType,:Image)";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':Title', $Title);
        $stmt->bindParam(':PetType', $PetType);
        $stmt->bindParam(':Description', $Description);
        $stmt->bindParam(':PostType', $PostType);
        $stmt->bindParam(':Image', $Image);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->execute();
    }
    public function deletePost($id)
    {
        $request = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        // return $stmt;
    }
    public function updatePost($id, $Title, $PetType, $Description, $PostType, $Image)
    {
        $request = "UPDATE posts SET Title = :Title, PetType = :PetType, Description = :Description, PostType = :PostType, Image = :Image WHERE id = :id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':Title', $Title);
        $stmt->bindParam(':PetType', $PetType);
        $stmt->bindParam(':Description', $Description);
        $stmt->bindParam(':PostType', $PostType);
        $stmt->bindParam(':Image', $Image);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // LIKES
    // LIKES
    // LIKES

    public function LikePost($post_id, $user_id)
    {
        if ($this->checkLike($post_id, $user_id) == false) {

            $request = "INSERT INTO likes (post_id,user_id) VALUES (:post_id,:user_id)";
        } else {
            $request = "DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id";
        }
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $data = [
            "likesCount" => $this->countLike($post_id),
        ];

        echo json_encode($data);
    }
    public function checkLike($post_id, $user_id)
    {
        $request = "SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result == false) {
            return false;
        } else {
            return true;
        }
    }
    public function countLike($post_id)
    {
        $request = "SELECT COUNT(id) as count FROM likes WHERE post_id = :post_id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    public function fetchFeedWithLikes()
    {
        $request = "select posts.*, count(likes.id) as likesCount, users.FirstName, users.LastName from posts LEFT join likes on posts.id = likes.post_id left join users on posts.UserID = users.id group by posts.id";
        $stmt = $this->db->prepare($request);
        $stmt->execute();
        $feed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $feed;
    }

    public function countUserPosts($user_id)
    {
        $request = "SELECT COUNT(id) as count FROM posts WHERE UserID = :user_id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }
}
