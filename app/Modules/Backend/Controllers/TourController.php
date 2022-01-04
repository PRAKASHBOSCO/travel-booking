<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
namespace App\Modules\Backend\Controllers;

use App\Services\Contracts\ITourService;
use App\Services\Contracts\ICommentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TorMorten\Eventy\Facades\Eventy;

class TourController extends Controller{
	private $service;
	private $commentService;

    public function __construct(ITourService $_service, ICommentService $_commentService) {
    	$this->service = $_service;
    	$this->commentService = $_commentService;
    }

    public function allReviewView(){
        $allPosts = $this->commentService->getReviewsPagination('tour', 5);
        return $this->getView($this->getFolderView('services.tour.review'), ['allPosts' => $allPosts]);
    }

    public function deleteTourAction(Request $request){
        $response = $this->service->deletePost($request);
        return response()->json($response);
    }

	public function editTourView($id){
		$postData = $this->service->storeTermData($id);
		if($postData) {
			$postData = $postData->getAttributes();
			$postData['post_type'] = 'tour';
            $postData = Eventy::filter('gmz_edit_tour_data', $postData);
			return $this->getView($this->getFolderView('services.tour.edit'), [
			    'serviceData' => $postData,
                'title' => __('Edit tour'),
                'new' => false
            ]);
		}
		return response()->redirectTo(dashboard_url('all-tours'));
	}

    public function allTourView(Request $request){
        $this->service->deletePostTemp();
        $status = $request->get('status', '');
        $where = [];
        $post_status = admin_config( 'tour_status');
        if(!empty($status) && in_array($status, array_keys($post_status))){
            $where['status'] = $status;
        }
	    $allPosts = $this->service->getPostsPagination(10, $where);
        return $this->getView($this->getFolderView('services.tour.all'), ['allPosts' => $allPosts]);
    }

    public function saveTourAction(Request $request){
	    $response = $this->service->savePost($request);
	    return response()->json($response);
    }

    public function newTourView(){
        $this->service->deletePostTemp();
	    $id = $this->service->storeNewPost();
	    $postData = $this->service->getPostById($id)->getAttributes();
	    $postData['post_type'] = 'tour';

        $postData = Eventy::filter('gmz_new_tour_data', $postData);

        return $this->getView( $this->getFolderView('services.tour.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new tour'),
            'new' => true
        ]);
    }
}