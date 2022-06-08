<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: *'); //method allowed
use Pusher\Pusher;

class NotificationController extends Controller
{
    private $pusher;

    public function __construct()
    {
        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
        );
        $this->pusher = new Pusher(
            'a69b81e700aaa217eaf4',
            'e73d8b9838ac36c45d98',
            '1419557',
            $options
        );
    }
    public function rejectVolunteer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $id = $data->id;
            
            $Data = [
                'titel' => 'Application Review',
                'status' => 'Rejected',
                'message' => 'your application for volunteering in the event been rejected'
            ];
            // $Data {
            //     "titel": "Application Review",
            //     "status" => "Rejected",
            //     "message" => "your application for volunteering in the event been rejected"
            // };
            $this->pusher->trigger('my-channel-' . $id, 'my-event',  $Data);
        }
    }
}
