<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: *'); //method allowed
class AdminController extends Controller
{

    public function index()
    {
        echo json_encode(['message' => 'Mre7ba Bik f findpet API']);
    }
    public function adminLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $email = $data->email;
            $password = $data->password;
            $admin = $this->model('AdminModel');
            $admin->login($email, $password);
            // return $this->json($admin);

        }
    }

    public function getAllUsers()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $admin = $this->model('AdminModel');
            return $this->json($admin->getAllusers());
        }
    }

    
}