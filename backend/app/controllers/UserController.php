<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
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
                echo json_encode(['message' => 'welcome to findpet']);
            }
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //decode json data and get email and password
            $data = json_decode(file_get_contents("php://input"));
            //put data into variables
            $Email = $data->Email;
            $Password = $data->Password;
            //call the model
            $user = $this->model('UserModel');
            //call the login method
            $user->login($Email, $Password);
        }
    }

    public function logout()
    {
        //unset session variables
        $user = $this->model('User');
        $user->logout();
        echo json_encode(['message' => 'User logged out']);
    }
}
