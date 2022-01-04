<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
namespace App\Modules\Backend\Controllers;

use App\Services\Contracts\IPageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller{
    private $service;

    public function __construct(IPageService $_service) {
        $this->service = $_service;
    }

    public function deletePageAction(Request $request){
        $response = $this->service->deletePage($request);
	    return response()->json($response);
    }

	public function editPageView($id){
		$postData = $this->service->getPostById($id);
		if(!is_null($postData)) {
            $postData = $postData->getAttributes();
            $postData['post_type'] = 'page';
            return $this->getView($this->getFolderView('services.page.edit'), [
                'serviceData' => $postData,
                'title' => __('Edit page'),
                'new' => false
            ]);
        }

        return response()->redirectTo(dashboard_url('all-pages'));
	}

    public function allPageView(Request $request){
        $this->service->deletePostTemp();
        $status = $request->get('status', '');
        $where = [];
        $post_status = admin_config( 'page_status');
        if(!empty($status) && in_array($status, array_keys($post_status))){
            $where['status'] = $status;
        }
        $allPosts = $this->service->getPostsPagination(10, $where);
        return $this->getView($this->getFolderView('services.page.all'), ['allPosts' => $allPosts]);
    }

    public function savePageAction(Request $request){
    	$response = $this->service->savePost($request);
	    return response()->json($response);
    }

    public function newPageView(){
        $this->service->deletePostTemp();
        $id = $this->service->storeNewPost();
        $postData = $this->service->getPostById($id)->getAttributes();
        $postData['post_type'] = 'page';
        return $this->getView( $this->getFolderView('services.page.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new page'),
            'new' => true
        ]);
    }



    //   public function forum_list(Request $request){
    //     $this->service->deletePostTemp();
    //     $status = $request->get('status', '');
    //     $where = [];
    //     $post_status = admin_config( 'page_status');
    //     if(!empty($status) && in_array($status, array_keys($post_status))){
    //         $where['status'] = $status;
    //     }
    //     $allPosts = $this->service->getPostsPagination(10, $where);
    //     return $this->getView($this->getFolderView('category.index'), ['allPosts' => $allPosts]);
    // }

    // public function newCategoryView(){
    //     $this->service->deletePostTemp();
    //     $id = $this->service->storeNewPost();
    //     $postData = $this->service->getPostById($id)->getAttributes();
    //     $postData['post_type'] = 'page';
    //     return $this->getView( $this->getFolderView('category.edit'), [
    //         'serviceData' => $postData,
    //         'title' => __('Add new page'),
    //         'new' => true
    //     ]);
    // }

    // public function editCategoryView($id){
    //     $postData = $this->service->getPostById($id);
    //     if(!is_null($postData)) {
    //         $postData = $postData->getAttributes();
    //         $postData['post_type'] = 'page';
    //         return $this->getView($this->getFolderView('category.edit'), [
    //             'serviceData' => $postData,
    //             'title' => __('Edit page'),
    //             'new' => false
    //         ]);
    //     }

    //     return response()->redirectTo(dashboard_url('forum_list'));
    // }
}