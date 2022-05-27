<?php
require_once APPROOT . '/config/config.php';

class AdminModel
{
    protected $db;
    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->DB;
    }

    public function login($email, $password)
    {
        $request = "SELECT * FROM admin WHERE email = :email";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($admin) {
            if ($admin['password'] == $password) {
                echo json_encode($admin);
            } else {
                echo json_encode(['message' => 'Invalid password']);
            }
        } else {
            echo json_encode(['message' => 'Admin not found']);
        }
    }

    public function getAllusers()
    {
        $request = "SELECT * FROM users";
        $stmt = $this->db->prepare($request);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
    }
    public function getlastthreeusers()
    {
        $request = "SELECT * FROM users ORDER BY id DESC LIMIT 3";
        $stmt = $this->db->prepare($request);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
    }
    public function getAllEvents()
    {
        $request = "SELECT * FROM events";
        $stmt = $this->db->prepare($request);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($events);
    }
    public function getOneEvent($id){
        $request = "SELECT * FROM events WHERE id = :id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($event);
    }
    public function createEvent($Title, $Description, $Date, $Time, $City, $Image)
    {
        $request = "INSERT INTO events (Title, Description, Date, Time, City, Image) VALUES (:Title, :Description, :Date, :Time, :City, :Image)";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':Title', $Title);
        $stmt->bindParam(':Description', $Description);
        $stmt->bindParam(':Date', $Date);
        $stmt->bindParam(':Time', $Time);
        $stmt->bindParam(':City', $City);
        $stmt->bindParam(':Image', $Image);
        $stmt->execute();
    }
    public function deleteEvent($id)
    {
        $request = "DELETE FROM events WHERE id = :id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function updateEvent($id, $Title, $Description, $Date, $Time, $City, $Image){
        $request = "UPDATE events SET Title = :Title, Description = :Description, Date = :Date, Time = :Time, City = :City, Image = :Image WHERE id = :id";
        $stmt = $this->db->prepare($request);
        $stmt->bindParam(':Title', $Title);
        $stmt->bindParam(':Description', $Description);
        $stmt->bindParam(':Date', $Date);
        $stmt->bindParam(':Time', $Time);
        $stmt->bindParam(':City', $City);
        $stmt->bindParam(':Image', $Image);
        $stmt->bindParam(':id', $id);
        // var_dump($_POST);
        // die();
        $stmt->execute();
    }
    public function getAllVolunteers()
    {
        $request = "SELECT * FROM volunteer";
        $stmt = $this->db->prepare($request);
        $stmt->execute();
        $volunteers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($volunteers);
    }
}
