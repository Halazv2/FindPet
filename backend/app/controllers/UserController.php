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
            var_dump($data);
            $user = $this->model('UserModel');
            if($user->register($FirstName, $LastName, $Email, $Password)) {
                echo json_encode(['message' => 'User mli7']);
            } else {
                echo json_encode(['message' => 'User Mamli7ch']);
            }
        }
    }

    public function login()
    {
        $user = $this->model('User');
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        $user->login();
        echo json_encode(['message' => 'User logged in']);
    }

    public function logout()
    {
        $user = $this->model('User');
        $user->logout();
        echo json_encode(['message' => 'User logged out']);
    }
}
