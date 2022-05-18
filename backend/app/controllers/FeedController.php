<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: *'); //method allowed
class FeedController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        echo json_encode(['message' => 'Mre7ba Bik f findpet API']);
    }
    public function getFeed()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $postsModel = $this->model('FeedModel');
            $posts = $postsModel->fetchFeedWithLikes();
            return $this->json($posts);
        }
    }
    public function addPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $data = json_decode(file_get_contents("php://input"));
            $Title = $_POST['Title'];
            $PetType = $_POST['PetType'];
            $Description = $_POST['Description'];
            $PostType = $_POST['PostType'];
            $Image = $_FILES['Image']['name'];
            $UserID = $_POST['UserID'];
            // Select file type
            // var_dump($_FILES['Image']);
            // die();
            $imageFileType = strtolower(pathinfo($Image, PATHINFO_EXTENSION));
            // valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "gif");
            // Check extension
            if (in_array($imageFileType, $extensions_arr)) {
                // save file to uploads folder
                $file_name = uniqid('', true) . '.' . $imageFileType;
                $target_path = $file_name;
                if (move_uploaded_file($_FILES['Image']['tmp_name'], 'C:\xampp\htdocs\fil-rouge-find-pet\backend\public\uploads\\' . $target_path)) {
                    $post = $this->model('FeedModel');
                    $post->addPost($Title, $PetType, $Description, $PostType, $target_path, $UserID);
                    //return last inserted id
                    $lastInsertId = $post->lastInsertId();
                    echo json_encode($lastInsertId);
                } else {
                    echo json_encode(['message' => 'Error uploading file']);
                }
            } else {
                echo json_encode(['message' => 'Invalid file type.']);
            }
        }
    }
    public function deletePost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $data = json_decode(file_get_contents("php://input"));
            $id = $data->id;
            $post = $this->model('FeedModel');
            $post->deletePost($id);
            if ($post) {
                echo json_encode(['message' => 'Post deleted successfully']);
            } else {
                echo json_encode(['message' => 'Error deleting post']);
            }
        }
    }
    public function updatePost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $data = json_decode(file_get_contents("php://input"));
            $id = $data->id;
            $Title = $data->Title;
            $PetType = $data->PetType;
            $Description = $data->Description;
            $PostType = $data->PostType;
            $Image = $data->Image;
            $UserID = $data->UserID;
            $post = $this->model('FeedModel');
            $post->updatePost($id, $Title, $PetType, $Description, $PostType, $Image, $UserID);
            if ($post) {
                echo json_encode(['message' => 'Post updated successfully']);
            } else {
                echo json_encode(['message' => 'Error updating post']);
            }
        }
    }


    //LIKE
    //LIKE
    //LIKE
    //LIKE

    public function likePost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $post_id = $data->post_id;
            $user_id = $data->user_id;
            $post = $this->model('FeedModel');
            $post->LikePost($post_id, $user_id);
        }
    }
    public function checkLike()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $post_id = $data->post_id;
            $user_id = $data->user_id;
            $post = $this->model('FeedModel');
            $post->checkLike($post_id, $user_id);
            return $this->json($post);

        }
    }
}
