<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
namespace App\Modules\Backend\Controllers;

use App\Services\Contracts\ITestimonialService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller{
    private $service;

    public function __construct(ITestimonialService $_service) {
        $this->service = $_service;
    }

    public function deletePageAction(Request $request){
        $response = $this->service->deletePage($request);
        return response()->json($response);
    }

    public function editTestimonialsView($id){
        $postData = $this->service->getPostById($id);
        if(!is_null($postData)) {
            $postData = $postData->getAttributes();
            $postData['post_type'] = 'page';
            return $this->getView($this->getFolderView('services.testimonials.edit'), [
                'serviceData' => $postData,
                'title' => __('Edit page'),
                'new' => false
            ]);
        }

        return response()->redirectTo(dashboard_url('all-pages'));
    }

    public function view_all(Request $request){
        $this->service->deletePostTemp();
        $status = $request->get('status', '');
        $where = [];
        $post_status = admin_config( 'page_status');
        if(!empty($status) && in_array($status, array_keys($post_status))){
            $where['status'] = $status;
        }
        $allPosts = $this->service->getPostsPagination(10, $where);
        return $this->getView($this->getFolderView('services.testimonials.all'), ['allPosts' => $allPosts]);
    }

    public function savePageAction(Request $request){
        $response = $this->service->savePost($request);
        return response()->json($response);
    }

    public function newTestimonials(){
        $this->service->deletePostTemp();
        echo $id = $this->service->storeNewPost();
        $postData = $this->service->getPostById($id)->getAttributes();
        $postData['post_type'] = 'page';
        return $this->getView( $this->getFolderView('services.testimonials.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new page'),
            'new' => true
        ]);
    }
}