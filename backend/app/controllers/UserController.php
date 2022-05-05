<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        echo json_encode(['message' => 'Mre7ba Bik f findpet API']);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $data = json_decode(file_get_contents("php://input"));
            $FirstName = $data->FirstName;
            $LastName = $data->LastName;
            $Email = $data->Email;
            $Password = $data->Password;
            $user = $this->model('UserModel');
            if($user->register($FirstName, $LastName, $Email, $Password)) {
                echo json_encode(['message' => 'User mli7']);
            }
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $Email = $data->Email;
            $Password = $data->Password;
            $user = $this->model('UserModel');
            if($user->login($Email, $Password)) {
                echo json_encode(['message' => 'You are logged in']);
            }
        }
    }

    public function logout()
    {
        $user = $this->model('User');
        $user->logout();
        echo json_encode(['message' => 'User logged out']);
    }
}
