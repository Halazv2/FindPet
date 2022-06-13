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
                'message' => 'your application for volunteering in the event been rejected if you have any questions please contact us',
            ];
            try {

                $this->pusher->trigger('my-channel-' . $id, 'my-event',  $Data);
                $accepted = $this->model('NotificationModel');
                $accepted->acceptedOrRejectVolunteer(0, $id, $Data['message']);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    public function deleteVolunteer($id)
    {
        $admin = $this->model('AdminModel');
        $admin->deleteVolunteer($id);
        return $this->json(['message' => 'Post Deleted Successfully']);
    }
    public function AcceptedVolunteer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $id = $data->id;
            // $event = $data->event;

            $Data = [
                'titel' => 'Application Review',
                // 'evant' => $event,
                'status' => 'Accepted',
                'message' => 'Your application for volunteering in the event been Accepted, see you soon!! if you have any questions please contact us',
            ];
            try {
                $this->pusher->trigger('my-channel-' . $id, 'my-event',  $Data);
                // self::deleteVolunteer($id);
                $accepted = $this->model('NotificationModel');
                $accepted->acceptedOrRejectVolunteer(1, $id, $Data['message']);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    public function getNotification()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $user_id = $_GET['user_id'];
            $notification = $this->model('NotificationModel');
            $result = $notification->getNotification($user_id);
            if ($result) {
                return $this->json($result);
            }
        }
    }
}
