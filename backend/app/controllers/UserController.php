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
        public function getUser()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $id = $_GET['id'];
                $user = $this->model('UserModel')->getUser($id);
                $this->json($user);
            } else {
                echo json_encode(['message' => 'Invalid request']);
            }
        }

        public function register()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $data = json_decode(file_get_contents("php://input"));
                $FirstName = $data->FirstName;
                $LastName = $data->LastName;
                $Email = $data->Email;
                $Password = password_hash($data->Password, PASSWORD_DEFAULT);
                $user = $this->model('UserModel');
                $user->register($FirstName, $LastName, $Email, $Password);
            }
        }

        public function login()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = json_decode(file_get_contents("php://input"));
                $Email = $data->Email;
                $Password = $data->Password;
                $user = $this->model('UserModel');
                $user->login($Email, $Password);
            }
        }

        public function logout()
        {
            //unset session variables
            $user = $this->model('UserModel');
            $user->logout();
            echo json_encode(['message' => 'User logged out']);
        }
        public function updateUser()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                $id = $_GET['id'];
                var_dump($id);
                $FirstName = $_POST['FirstName'];
                $LastName = $_POST['LastName'];
                $Email = $_POST['Email'];
                $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
                $PhoneNumber = $_POST['PhoneNumber'];
                $City = $_POST['City'];
                $ProfilePic = $_FILES['ProfilePic'];

                // $user = $this->model('UserModel');
                // $user->updateUser($id, $FirstName, $LastName, $Email, $Password, $PhoneNumber, $City, $ProfilePic);
                $imageFileType = strtolower(pathinfo($ProfilePic, PATHINFO_EXTENSION));
                $extensions_arr = array("jpg", "jpeg", "png", "gif");

                if (!empty($_FILES['Image']['name'])) {
                    if (in_array($imageFileType, $extensions_arr)) {
                        // Insert record
                        $user = $this->model('UserModel');
                        $user->updateUser($id, $FirstName, $LastName, $Email, $Password, $PhoneNumber, $City, $ProfilePic);
                        // Upload file
                        $file_name = uniqid('', true) . '.' . $imageFileType;
                        $target_path = $file_name;
                        move_uploaded_file($_FILES['Image']['tmp_name'], 'C:\xampp\htdocs\fil-rouge-find-pet\backend\public\uploads\profileImages\\' . $target_path);
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    $user = $this->model('UserModel');
                    $user->updateUser($id, $FirstName, $LastName, $Email, $Password, $PhoneNumber, $City, $ProfilePic);
                    return true;
                }

                // if (in_array($imageFileType, $extensions_arr)) {
                //     // save file to uploads folder
                //     $file_name = uniqid('', true) . '.' . $imageFileType;
                //     $target_path = $file_name;
                //     if (move_uploaded_file($_FILES['Image']['tmp_name'], 'C:\xampp\htdocs\fil-rouge-find-pet\backend\public\uploads\profileImages\\' . $target_path)) {
                //         $user = $this->model('UserModel');
                //         $user->updateUser($FirstName, $LastName, $Email, $Password, $PhoneNumber, $City, $ProfilePic);
                //     } else {
                //         echo json_encode(['message' => 'Error uploading file']);
                //     }
                // } else {
                //     echo json_encode(['message' => 'Invalid file type.']);
                // }


            }
        }
    }
