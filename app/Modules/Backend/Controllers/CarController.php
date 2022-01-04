<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
namespace App\Modules\Backend\Controllers;

use App\Services\Contracts\ICarService;
use App\Services\Contracts\ICommentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller{
	private $service;
	private $commentService;

    public function __construct(ICarService $_service, ICommentService $_commentService) {
    	$this->service = $_service;
    	$this->commentService = $_commentService;
    }

    public function allReviewView(){
        $allPosts = $this->commentService->getReviewsPagination('car', 5);
        return $this->getView($this->getFolderView('services.car.review'), ['allPosts' => $allPosts]);
    }

    public function deleteCarAction(Request $request){
        $response = $this->service->deletePost($request);
        return response()->json($response);
    }

	public function editCarView($id){
		$postData = $this->service->storeTermData($id);
		if($postData) {
			$postData = $postData->getAttributes();
			$postData['post_type'] = 'car';
			return $this->getView($this->getFolderView('services.car.edit'), [
			    'serviceData' => $postData,
                'title' => __('Edit car'),
                'new' => false
            ]);
		}
		return response()->redirectTo(dashboard_url('all-cars'));
	}

    public function allCarView(Request $request){
        $this->service->deletePostTemp();
        $status = $request->get('status', '');
        $where = [];
        $post_status = admin_config( 'car_status');
        if(!empty($status) && in_array($status, array_keys($post_status))){
            $where['status'] = $status;
        }
	    $allPosts = $this->service->getPostsPagination(10, $where);
        return $this->getView($this->getFolderView('services.car.all'), ['allPosts' => $allPosts]);
    }

    public function saveCarAction(Request $request){
	    $response = $this->service->savePost($request);
	    return response()->json($response);
    }

    public function newCarView(){
        $this->service->deletePostTemp();
	    $id = $this->service->storeNewPost();
	    $postData = $this->service->getPostById($id)->getAttributes();
	    $postData['post_type'] = 'car';
        return $this->getView( $this->getFolderView('services.car.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new car'),
            'new' => true
        ]);
    }
}