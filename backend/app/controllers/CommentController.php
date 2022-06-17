<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: *'); //method allowed
class CommentController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        echo json_encode(['message' => 'Mre7ba Bik f findpet API']);
    }

    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $comment = $data['comment'];
            $user_id = $data['user_id'];
            $post_id = $data['post_id'];
            $postsModel = $this->model('CommentModel');
            $postsModel->addComment($comment, $user_id, $post_id);
            return $this->json(['message' => 'Comment added']);
        }
    }
    public function getComments()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $post_id = $_GET['post_id'];
            $postsModel = $this->model('CommentModel');
            $comments = $postsModel->getComments($post_id);
            return $this->json($comments);
        }
    }
    public function countComment()
    {
            $post_id = $_GET['post_id'];
            $postsModel = $this->model('CommentModel');
            $comments = $postsModel->countComment($post_id);
        echo json_encode(json_encode($comments));
        
    }
    public function deleteComment(){
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE'){
            $data = json_decode(file_get_contents('php://input'),true);
            $comment_id = $data['comment_id'];
            $commentModel = $this->model('CommentModel');
            $commentModel->deleteComment($comment_id);
            return $this->json(['message' => 'Comment deleted']);
        }
    }
    public function updateComment(){
        if ($_SERVER['REQUEST_METHOD'] === 'PUT'){
            $data = json_decode(file_get_contents('php://input'),true);
            $comment = $data['comment'];
            $comment_id = $data['comment_id'];
            $commentModel = $this->model('CommentModel');
            $commentModel->updateComment($comment, $comment_id);
            return $this->json(['message' => 'Comment updated']);
        }
    }
}
