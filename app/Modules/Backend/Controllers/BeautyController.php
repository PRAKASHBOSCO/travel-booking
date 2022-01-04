<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */

namespace App\Modules\Backend\Controllers;

use App\Models\Beauty;
use App\Services\Contracts\IBeautyService;
use App\Services\Contracts\ICommentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeautyController extends Controller
{
    private $service;
    private $commentService;

    public function __construct(IBeautyService $_service, ICommentService $_commentService)
    {
        $this->service = $_service;
        $this->commentService = $_commentService;

    }

    public function allReviewView(){
        $allPosts = $this->commentService->getReviewsPagination(GMZ_SERVICE_BEAUTY, 5);
        return $this->getView($this->getFolderView('services.beauty.review'), ['allPosts' => $allPosts]);
    }

    public function newBeautyView()
    {
        $this->service->deletePostTemp();
        $id = $this->service->storeNewPost();
        $postData = $this->service->getPostById($id)->getAttributes();
        $postData['post_type'] = GMZ_SERVICE_BEAUTY;

        $postData['list_data_agent'] = get_all_agent_by_author(GMZ_SERVICE_BEAUTY, $postData['author']);
        $postData['list_data_day_off_week'] = get_day_of_week();


        return $this->getView($this->getFolderView('services.beauty.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new beauty services'),
            'new' => true
        ]);
    }

    public function editBeautyView($id)
    {

        $postData = $this->service->getFullPostById($id);
        if (is_array($postData)) {

            if (isset($postData['agent'])) {
                //get all agent ID
                $agent = array();
                foreach ($postData['agent'] as $value) {
                    $agent[] = $value['id'];
                }
                $postData['agent'] = $agent;
            }

            $postData['list_data_agent'] = get_all_agent_by_author(GMZ_SERVICE_BEAUTY, $postData['author']);
            $postData['list_data_day_off_week'] = get_day_of_week();

            $postData['service_starts'] = seconds_to_hours($postData['service_starts']);
            $postData['service_ends'] = seconds_to_hours($postData['service_ends']);
            $postData['service_duration'] = seconds_to_hours($postData['service_duration']);
            $postData['day_off_week'] = empty($postData['day_off_week']) ? '' : explode(',', $postData['day_off_week']);
            $postData['post_type'] = GMZ_SERVICE_BEAUTY;

            return $this->getView($this->getFolderView('services.beauty.edit'), [
                'serviceData' => $postData,
                'title' => __('Edit beauty'),
                'new' => false
            ]);
        }

        return response()->redirectTo(dashboard_url('all-beauty'));
    }

    public function saveBeautyAction(Request $request)
    {
        $response = $this->service->savePost($request);
        return response()->json($response);
    }

    public function allBeautyView(Request $request)
    {
        $this->service->deletePostTemp();
        $status = $request->get('status', '');
        $where = [];
        $post_status = admin_config('beauty_status');

        if (!empty($status) && in_array($status, array_keys($post_status))) {
            $where['status'] = $status;
        }

        $allPosts = $this->service->getPostsPagination(10, $where);
        return $this->getView($this->getFolderView('services.beauty.all'), ['allPosts' => $allPosts]);
    }

    public function deleteBeautyAction(Request $request)
    {
        $response = $this->service->deletePost($request);
        return response()->json($response);
    }

}