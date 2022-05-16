<?php
require_once APPROOT . '/config/config.php';

class FeedModel
{
    protected $db;
    public function __construct()
    {
        $conn = new Database();
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
    public function getPost($id)
    {
        $request = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        return $post;
    }
    
    public function addPost($Title,$PetType,$Description,$PostType,$Image,$UserID)
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

}
