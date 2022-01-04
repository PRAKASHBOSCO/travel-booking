<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
namespace App\Modules\Backend\Controllers;

use App\Services\Contracts\ISpaceService;
use App\Services\Contracts\ICommentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpaceController extends Controller{
	private $service;
	private $commentService;

    public function __construct(ISpaceService $_service, ICommentService $_commentService) {
    	$this->service = $_service;
    	$this->commentService = $_commentService;
    }

    public function allReviewView(){
        $allPosts = $this->commentService->getReviewsPagination('space', 5);
        return $this->getView($this->getFolderView('services.space.review'), ['allPosts' => $allPosts]);
    }

    public function deleteSpaceAction(Request $request){
        $response = $this->service->deletePost($request);
        return response()->json($response);
    }

	public function editSpaceView($id){
		$postData = $this->service->storeTermData($id);
		if($postData) {
			$postData = $postData->getAttributes();
			$postData['post_type'] = 'space';
			return $this->getView($this->getFolderView('services.space.edit'), [
			    'serviceData' => $postData,
                'title' => __('Edit space'),
                'new' => false
            ]);
		}
		return response()->redirectTo(dashboard_url('all-space'));
	}

    public function allSpaceView(Request $request){
        $this->service->deletePostTemp();
        $status = $request->get('status', '');
        $where = [];
        $post_status = admin_config( 'space_status');
        if(!empty($status) && in_array($status, array_keys($post_status))){
            $where['status'] = $status;
        }
	    $allPosts = $this->service->getPostsPagination(10, $where);
        return $this->getView($this->getFolderView('services.space.all'), ['allPosts' => $allPosts]);
    }

    public function saveSpaceAction(Request $request){
	    $response = $this->service->savePost($request);
	    return response()->json($response);
    }

    public function newSpaceView(){
        $this->service->deletePostTemp();
	    $id = $this->service->storeNewPost();
	    $postData = $this->service->getPostById($id)->getAttributes();
	    $postData['post_type'] = 'space';
        return $this->getView( $this->getFolderView('services.space.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new space'),
            'new' => true
        ]);
    }
}