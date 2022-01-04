<?php
namespace App\Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mockery\Exception;
use Session;
use Illuminate\Support\Facades\DB;
use Artisan;

class NotificationController extends Controller{

    public function __construct() {

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