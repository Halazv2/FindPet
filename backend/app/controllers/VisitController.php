<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: *'); //method allowed
class UserController extends Controller
{
    public function __construct()
    {
    }
    public function ContactUs()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $FullName = $data->FullName;
            $Email = $data->Email;
            $Message = $data->Message;
            $visit = $this->model('VisitModel');
            $visit->ContactUs($FullName, $Email, $Message);
        }
    }
}
