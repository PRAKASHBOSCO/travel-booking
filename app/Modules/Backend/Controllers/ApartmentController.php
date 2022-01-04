<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
namespace App\Modules\Backend\Controllers;

use App\Services\Contracts\IApartmentService;
use App\Services\Contracts\ICommentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller{
	private $service;
	private $commentService;

    public function __construct(IApartmentService $_service, ICommentService $_commentService) {
    	$this->service = $_service;
    	$this->commentService = $_commentService;
    }

    public function allReviewView(){
        $allPosts = $this->commentService->getReviewsPagination('apartment', 5);
        return $this->getView($this->getFolderView('services.apartment.review'), ['allPosts' => $allPosts]);
    }

    public function deleteApartmentAction(Request $request){
        $response = $this->service->deletePost($request);
        return response()->json($response);
    }

	public function editApartmentView($id){
		$postData = $this->service->storeTermData($id);
		if($postData) {
			$postData = $postData->getAttributes();
			$postData['post_type'] = 'apartment';
			return $this->getView($this->getFolderView('services.apartment.edit'), [
			    'serviceData' => $postData,
                'title' => __('Edit apartment'),
                'new' => false
            ]);
		}
		return response()->redirectTo(dashboard_url('all-apartments'));
	}

    public function allApartmentView(Request $request){
        $this->service->deletePostTemp();
        $status = $request->get('status', '');
        $where = [];
        $post_status = admin_config( 'apartment_status');
        if(!empty($status) && in_array($status, array_keys($post_status))){
            $where['status'] = $status;
        }
	    $allPosts = $this->service->getPostsPagination(10, $where);
        return $this->getView($this->getFolderView('services.apartment.all'), ['allPosts' => $allPosts]);
    }

    public function saveApartmentAction(Request $request){
	    $response = $this->service->savePost($request);
	    return response()->json($response);
    }

    public function newApartmentView(){
        $this->service->deletePostTemp();
	    $id = $this->service->storeNewPost();
	    $postData = $this->service->getPostById($id)->getAttributes();
	    $postData['post_type'] = 'apartment';
        return $this->getView( $this->getFolderView('services.apartment.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new apartment'),
            'new' => true
        ]);
    }
}