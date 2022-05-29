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
}
