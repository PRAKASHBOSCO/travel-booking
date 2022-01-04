<?php


namespace App\Modules\Backend\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Services\Contracts\ICommentService;
use App\Services\Contracts\INotificationService;
use App\Services\Contracts\IPostService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    private $service;

    public function __construct(INotificationService $_service) {
        $this->service = $_service;
    }

    public function notificationView(Request $request){
        $model = new Notification();
        $time = date('Y-m-d H:i:s');
        $model->updateLastCheckNotify(get_current_user_id(), ['last_check_notification' => $time]);
        $allPosts = $this->service->getPostsPagination(10, ['user_to' => get_current_user_id()]);
        return $this->getView($this->getFolderView('notification.all'), ['allPosts' => $allPosts]);
    }

    public function updateCheckAction(Request $request){
        $params = $request->post('params', '');
        if(!empty($params)){
            $params = json_decode(base64_decode($params), true);
            if(gmz_compare_hashing($params['user_id'], $params['user_hashing'])){
                $time = date('Y-m-d H:i:s');
                $user = get_user_data($params['user_id']);
                if ($user) {
                    $model = new Notification();
                    $model->updateLastCheckNotify($params['user_id'], ['last_check_notification' => $time]);
                    return ['status' => true];
                }
            }
        }
        return ['status' => false];
    }
}