<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
namespace App\Modules\Backend\Controllers;

use App\Services\Contracts\ICommentService;
use App\Services\Contracts\IRoomService;
use App\Services\Contracts\IHotelService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller{
	private $service;
	private $hotelService;
	private $commentService;

    public function __construct(IRoomService $_service, IHotelService $_hotelService, ICommentService $_commentService) {
    	$this->service = $_service;
    	$this->hotelService = $_hotelService;
    	$this->commentService = $_commentService;
    }

    public function deleteRoomAction(Request $request){
        $response = $this->service->deletePost($request);
        return response()->json($response);
    }

    public function editRoomView($id){
        $postData = $this->service->storeTermData($id);
        if($postData) {
            $postData = $postData->getAttributes();
            $postData['post_type'] = GMZ_SERVICE_ROOM;
            return $this->getView($this->getFolderView('services.room.edit'), [
                'serviceData' => $postData,
                'title' => __('Edit room'),
                'new' => false
            ]);
        }
        return response()->redirectTo(dashboard_url('all-rooms'));
    }

    public function saveRoomAction(Request $request){
        $response = $this->service->savePost($request);
        return response()->json($response);
    }

    public function newRoomView(Request $request){
        $hotel_id = $request->get('hotel_id', '');
        if(!empty($hotel_id)) {
            $hotel_object = $this->hotelService->getPostById($hotel_id);
            if ($hotel_object) {
                $this->service->deletePostTemp($hotel_id);
                if (is_admin() || (is_partner() && $hotel_object['author'] == get_current_user_id())) {
                    $id = $this->service->storeNewPost($hotel_id);
                    $postData = $this->service->getPostById($id)->getAttributes();
                    $this->service->addRoomAvailability($postData);
                    $postData['post_type'] = GMZ_SERVICE_ROOM;
                    return $this->getView($this->getFolderView('services.room.edit'), [
                        'serviceData' => $postData,
                        'title' => __('Add new room'),
                        'new' => true
                    ]);
                }
            }
        }
        return response()->redirectTo(dashboard_url('all-hotels'));
    }

    public function allRoomView(Request $request){
        $hotel_id = $request->get('hotel_id', '');
        if(!empty($hotel_id)) {
            $hotel_object = $this->hotelService->getPostById($hotel_id);
            if ($hotel_object) {
                $this->service->deletePostTemp($hotel_id);
                if (is_admin() || (is_partner() && $hotel_object['author'] == get_current_user_id())) {
                    $status = $request->get('status', '');
                    $where = [];
                    $post_status = admin_config('room_status');
                    if (!empty($status) && in_array($status, array_keys($post_status))) {
                        $where['status'] = $status;
                    }
                    $where['hotel_id'] = $hotel_id;
                    $allPosts = $this->service->getPostsPagination(10, $where);
                    return $this->getView($this->getFolderView('services.room.all'), ['allPosts' => $allPosts, 'hotel_id' => $hotel_id]);
                }
            }
        }
        return response()->redirectTo(dashboard_url('all-hotels'));
    }
}