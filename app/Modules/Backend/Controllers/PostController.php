<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
namespace App\Modules\Backend\Controllers;

use App\Services\Contracts\ICommentService;
use App\Services\Contracts\IPostService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller{
    private $service;
    private $commentService;

    public function __construct(IPostService $_service, ICommentService $_commentService) {
        $this->service = $_service;
        $this->commentService = $_commentService;
    }

    public function allCommentView(){
        $allPosts = $this->commentService->getReviewsPagination('post', 5);
        return $this->getView($this->getFolderView('services.post.comment'), ['allPosts' => $allPosts]);
    }

    public function deletePostAction(Request $request){
        $response = $this->service->deletePost($request);
	    return response()->json($response);
    }

	public function editPostView($id){
        $postData = $this->service->storeTermData($id);
		if($postData) {
		    $postData = $postData->getAttributes();
            $postData['post_type'] = 'post';
            return $this->getView($this->getFolderView('services.post.edit'), [
                'serviceData' => $postData,
                'title' => __('Edit post'),
                'new' => false
            ]);
        }
        return response()->redirectTo(dashboard_url('all-posts'));
	}

    public function allPostView(Request $request){
        $this->service->deletePostTemp();
        $status = $request->get('status', '');
        $where = [];
        $post_status = admin_config( 'post_status');
        if(!empty($status) && in_array($status, array_keys($post_status))){
            $where['status'] = $status;
        }
        $allPosts = $this->service->getPostsPagination(10, $where);
        return $this->getView($this->getFolderView('services.post.all'), ['allPosts' => $allPosts]);
    }

    public function savePostAction(Request $request){
    	$response = $this->service->savePost($request);
	    return response()->json($response);
    }

    public function newPostView(){
        $this->service->deletePostTemp();
    	$id = $this->service->storeNewPost();
    	$postData = $this->service->getPostById($id)->getAttributes();
    	$postData['post_type'] = 'post';
        return $this->getView($this->getFolderView('services.post.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new post'),
            'new' => true
        ]);
    }
}