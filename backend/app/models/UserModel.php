<?php
require_once APPROOT . '/config/config.php';
class UserModel
{
    protected $db;
    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->DB;
    }

    public function register($FirstName, $LastName, $Email, $Password, $ProfilePic)
    {
        $request = "INSERT  INTO users (FirstName, LastName, Email, Password, ProfilePic) VALUES (:FirstName, :LastName, :Email, :Password, :ProfilePic)";
        $check = "SELECT * FROM users WHERE Email = :Email";
        $stmt = $this->db->prepare($check);
        $stmt->bindParam(':Email', $Email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            echo json_encode(['message' => 'This email already exists, try another one']);
        } else {
            $stmt = $this->db->prepare($request);
            $stmt->bindParam(':FirstName', $FirstName);
            $stmt->bindParam(':LastName', $LastName);
            $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':Password', $Password);
            $stmt->bindParam(':ProfilePic', $ProfilePic);
            $stmt->execute();
            //return user data
            $user = $this->getUser($Email);
            echo json_encode(["user" => $user]);
        }
    }
    public function getUser($id)
    {
        $request = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function login($Email, $Password, $status)
    {
        $request = "SELECT * FROM users WHERE Email = :Email ;
        UPDATE users SET status = :status WHERE Email = :Email";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        //check if user is registered
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            //check if password is correct
            if (password_verify($Password, $user['Password'])) {
                //return user info
                echo json_encode($user);
            } else {
                echo json_encode(['message' => 'Invalid password']);
            }
        } else {
            echo json_encode(['message' => 'User not found']);
        }
    }


    public function logout($Email, $status)
    {
        $request = "UPDATE users SET status = :status WHERE Email = :Email";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        return 0;
    }
    
    public function updateUser($id, $FirstName, $LastName, $Email, $Password, $PhoneNumber, $City, $ProfilePic)
    {
        $request = "UPDATE users SET FirstName = :FirstName, LastName = :LastName, Email = :Email, Password = :Password, PhoneNumber = :PhoneNumber, City = :City, ProfilePic = :ProfilePic WHERE id = :id";
        $stmt = $this->db->prepare($request);
        $stmt->execute(
            [
                'FirstName' => $FirstName,
                'LastName' => $LastName,
                'Email' => $Email,
                'Password' => $Password,
                'PhoneNumber' => $PhoneNumber,
                'City' => $City,
                'ProfilePic' => $ProfilePic,
                'id' => $id
            ]
        );
    }

    public function volunteer($id, $event_id, $Description)
    {
        if ($this->CheckVolunteer($id, $event_id) == true) {
            echo json_encode(['message' => 'You are already volunteer for this event :)']);
        } else {
            $request = "INSERT INTO volunteer (user_id, event_id, Description) VALUES (:user_id, :event_id, :Description)";
            $stmt = $this->db->prepare($request);
            $stmt->execute(
                [
                    'user_id' => $id,
                    'event_id' => $event_id,
                    'Description' => $Description
                ]
            );
            echo json_encode(['message' => 'Volunteer added']);
        }
    }

    public function CheckVolunteer($id, $event_id)
    {
        $request = "SELECT * FROM volunteer WHERE user_id = :user_id AND event_id = :event_id";
        $stmt = $this->db->prepare($request);
        $stmt->execute(
            [
                'user_id' => $id,
                'event_id' => $event_id
            ]
        );
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user == false) {
            return false;
        } else {
            return true;
        }
    }
}
