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
            $admin->getAllusers();
        }
    }
    public function getlastthreeusers()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $admin = $this->model('AdminModel');
            $admin->getlastthreeusers();
        }
    }
    public function getAllEvents()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $admin = $this->model('AdminModel');
            $admin->getAllEvents();
        }
    }
    public function getOneEvent()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $admin = $this->model('AdminModel');
            $admin->getOneEvent($id);
        }
    }
    public function createEvent()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Title = $_POST['Title'];
            $Description = $_POST['Description'];
            $Date = $_POST['Date'];
            $Time = $_POST['Time'];
            $City = $_POST['City'];
            $Image = $_FILES['Image']['name'];
            $imageFileType = strtolower(pathinfo($Image, PATHINFO_EXTENSION));
            // valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "gif");
            // Check extension
            //check if request has image
            if (!empty($_FILES['Image']['name'])) {
                if (in_array($imageFileType, $extensions_arr)) {
                    // Insert record
                    $file_name = uniqid('', true) . '.' . $imageFileType;
                    $target_path = $file_name;
                    move_uploaded_file($_FILES['Image']['tmp_name'], 'C:\xampp\htdocs\fil-rouge-find-pet\backend\public\uploads\Eventimages\\' . $target_path);
                    $postsModel = $this->model('AdminModel');
                    $postsModel->createEvent($Title, $Description, $Date, $Time, $City, $target_path);
                    // Upload file
                    return $this->json(['message' => 'Post Added Successfully']);
                } else {
                    return $this->json(['message' => 'Invalid File Type']);
                }
            } else {
                $postsModel = $this->model('AdminModel');
                $postsModel->createEvent($Title, $Description, $Date, $Time, $City, $Image);
            }
        }
    }

    public function deleteEvent()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $data = json_decode(file_get_contents("php://input"));
            $id = $data->id;
            $admin = $this->model('AdminModel');
            $admin->deleteEvent($id);
            return $this->json(['message' => 'Post Deleted Successfully']);
        }
    }

    public function updateEvent()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $Title = $_POST['Title'];
            $Description = $_POST['Description'];
            $Date = $_POST['Date'];
            $Time = $_POST['Time'];
            $City = $_POST['City'];
            $Image = $_FILES['image']['name'];
            $imageFileType = strtolower(pathinfo($Image, PATHINFO_EXTENSION));
            // valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "gif");
            // Check extension
            //check if request has image
            if (!empty($_FILES['image']['name'])) {
                if (in_array($imageFileType, $extensions_arr)) {
                    // Insert record
                    $file_name = uniqid('', true) . '.' . $imageFileType;
                    $target_path = $file_name;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'C:\xampp\htdocs\fil-rouge-find-pet\backend\public\uploads\Eventimages\\' . $target_path);
                    $postsModel = $this->model('AdminModel');
                    $postsModel->updateEvent($id, $Title, $Description, $Date, $Time, $City, $target_path);
                    // Upload file
                    return $this->json(['message' => 'Post updated Successfully']);
                } else {
                    return $this->json(['message' => 'Invalid File Type']);
                }
            } else {
                $postsModel = $this->model('AdminModel');
                $postsModel->updateEvent($id, $Title, $Description, $Date, $Time, $City, $Image);
            }
        }
    }

    public function getAllVolunteers()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $admin = $this->model('AdminModel');
            $admin->getAllVolunteers();
        }
    }
    public function deleteVolunteer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $data = json_decode(file_get_contents("php://input"));
            $id = $data->id;
            $admin = $this->model('AdminModel');
            $admin->deleteVolunteer($id);
            return $this->json(['message' => 'Post Deleted Successfully']);
        }
    }
    public function countPosts()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $admin = $this->model('AdminModel');
            $admin->countPosts();
        }
    }
    public function countUsers()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $admin = $this->model('AdminModel');
            $admin->countUsers();
        }
    }
}
