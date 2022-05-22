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
            $Title = $_POST['Title'];
            $PetType = $_POST['PetType'];
            $Description = $_POST['Description'];
            $PostType = $_POST['PostType'];
            $Image = $_FILES['Image']['name'];
            $UserID = $_POST['UserID'];

            $imageFileType = strtolower(pathinfo($Image, PATHINFO_EXTENSION));
            // valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "gif");
            // Check extension
            //check if request has image
            if (!empty($_FILES['Image']['name'])) {
                if (in_array($imageFileType, $extensions_arr)) {
                    // Insert record
                    // Upload file
                    $file_name = uniqid('', true) . '.' . $imageFileType;
                    $target_path = $file_name;
                    move_uploaded_file($_FILES['Image']['tmp_name'], 'C:\xampp\htdocs\fil-rouge-find-pet\backend\public\uploads\Feedimages\\' . $target_path);
                    $postsModel = $this->model('FeedModel');
                    $postsModel->addPost($Title, $PetType, $Description, $PostType, $target_path, $UserID);
                    return $this->json(['message' => 'Post Added Successfully']);
                } else {
                    return $this->json(['message' => 'Invalid File Type']);
                }
            } else {
                $postsModel = $this->model('FeedModel');
                $postsModel->addPost($Title, $PetType, $Description, $PostType, null, $UserID);
                $lastInsertId = $postsModel->lastInsertId();
                return $this->json($lastInsertId);
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $Title = $_POST['Title'];
            $PetType = $_POST['PetType'];
            $Description = $_POST['Description'];
            $PostType = $_POST['PostType'];
            $Image = $_FILES['Image']['name'] ?? null;

            $imageFileType = strtolower(pathinfo($Image, PATHINFO_EXTENSION));
            $extensions_arr = array("jpg", "jpeg", "png", "gif");

            if (isset($_FILES['Image']) && !empty($_FILES['Image']['name'])) {
                if (in_array($imageFileType, $extensions_arr)) {
                    $file_name = uniqid('', true) . '.' . $imageFileType;
                    $target_path = $file_name;
                    move_uploaded_file($_FILES['Image']['tmp_name'], 'C:\xampp\htdocs\fil-rouge-find-pet\backend\public\uploads\Feedimages\\' . $target_path);
                    $postsModel = $this->model('FeedModel');
                    $postsModel->updatePost($id, $Title, $PetType, $Description, $PostType, $target_path);
                    return $this->json(['message' => 'Post Added Successfully']);
                } else {
                    return $this->json(['message' => 'Invalid File Type']);
                }
            } else {
                $postsModel = $this->model('FeedModel');
                $postsModel->updatePost($id, $Title, $PetType, $Description, $PostType, null);
            }
        }
    }
    public function getPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            //get post id from url
            $id = $_GET['id'];
            $post = $this->model('FeedModel');
            $post = $post->getPost($id);
            return $this->json($post);
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
