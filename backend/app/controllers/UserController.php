<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: *'); //method allowed
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
            if ($user->register($FirstName, $LastName, $Email, $Password)) {
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




    // public function updateUser(){
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         //decode json data and get email and password firstname lastname phonenumber city 
    //         $data = json_decode(file_get_contents("php://input"));
    //         $FirstName = $data->FirstName;
    //         $LastName = $data->LastName;
    //         $Email = $data->Email;
    //         $Password = $data->Password;
    //         $PhoneNumber = $data->PhoneNumber;
    //         $City = $data->City;
    //         $ProfilePic = $data->ProfilePic;
    //         $user = $this->model('UserModel');
    //         $user->updateUser($FirstName, $LastName, $Email, $Password, $PhoneNumber, $City, "empty");
    //         //check if request has file 
    //         if (isset($_FILES['ProfilePic'])) {
    //             //check if file is an image
    //             if ($fileType == 'image/jpeg' || $fileType == 'image/png') {
    //                 //check if file size is less than 5mb
    //                 if ($fileSize < 5000000) {
    //                     //check if file has error
    //                     if ($fileError === 0) {
    //                         //get file name
    //                         $fileName = $_FILES['ProfilePic']['name'];
    //                         //get file extension
    //                         $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    //                         //get file size
    //                         $fileSize = $_FILES['ProfilePic']['size'];
    //                         //get file tmp name
    //                         $fileTmpName = $_FILES['ProfilePic']['tmp_name'];
    //                         //get file type
    //                         $fileType = $_FILES['ProfilePic']['type'];
    //                         //get file error
    //                         $fileError = $_FILES['ProfilePic']['error']; 
    //                         //get file path
    //                         $filePath = 'uploads/' . $fileName;
    //                         //move file to uploads folder
    //                         move_uploaded_file($fileTmpName, $filePath);
    //                         //call the model
    //                         $user = $this->model('UserModel');
    //                         //call the update method
    //                         $user->updateUser($filePath);
    //                         echo json_encode(['message' => 'User updated']);
    //                     } else {
    //                         echo json_encode(['message' => 'Error uploading file']);
    //                     }
    //                 } else {
    //                     echo json_encode(['message' => 'File size too big']);
    //                 }
    //             } else {
    //                 echo json_encode(['message' => 'File not an image']);
    //             }
    //         } else {
    //             //call the model
    //             $user = $this->model('UserModel');
    //             //call the update method
    //             $user->updateUser($FirstName, $LastName, $Email, $Password, $PhoneNumber, $City,$ProfilePic);
    //             echo json_encode(['message' => 'User updated']);
    //         }

    //     }
    // }
}
