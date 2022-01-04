<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
namespace App\Modules\Backend\Controllers;

use App\Services\Contracts\IAgentService;
use App\Services\Contracts\ICommentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentController extends Controller{
   private $service;
   private $commentService;

   public function __construct(IAgentService $_service, ICommentService $_commentService) {
      $this->service = $_service;
      $this->commentService = $_commentService;
   }

   public function newAgentView($service){
      if (!in_array($service, get_services_enabled(), true)){
         return redirect()->route('dashboard');
      }
      $this->service->deletePostTemp();
      $id = $this->service->storeNewPost($service);
      $postData = $this->service->getPostById($id)->getAttributes();
      $postData['post_type'] = GMZ_SERVICE_AGENT;

      return $this->getView( $this->getFolderView('services.agent.edit'), [
         'serviceData' => $postData,
         'title' => __('Add new agent'),
         'new' => true
      ]);
   }
   public function editAgentView($service, $id){
      $postData = $this->service->storeTermData($id);
      if($postData) {
         $postData = $postData->getAttributes();
         $postData['post_type'] = GMZ_SERVICE_AGENT;
         return $this->getView($this->getFolderView('services.agent.edit'), [
            'serviceData' => $postData,
            'title' => __('Edit agent'),
            'new' => false
         ]);
      }
      return response()->redirectTo(dashboard_url('all-agents'));
   }

   public function saveAgentAction(Request $request){
      $response = $this->service->savePost($request);
      return response()->json($response);
   }

   public function allAgentView(Request $request, $service){
      if (!in_array($service, get_services_enabled(), true)){
         return redirect()->route('dashboard');
      }

      $this->service->deletePostTemp();
      $status = $request->get('status', '');
      $where = [];
      $where['post_type'] = $service;
      $post_status = admin_config( 'agent_status');

      if(!empty($status) && in_array($status, array_keys($post_status))){
         $where['status'] = $status;
      }


      $allPosts = $this->service->getPostsPagination(10, $where);
      return $this->getView($this->getFolderView('services.agent.all'), ['allPosts' => $allPosts]);
   }

   public function deleteAgentAction(Request $request){
      $response = $this->service->deletePost($request);
      return response()->json($response);
   }


   /*public function newAgentView(){
      $this->service->deletePostTemp();
      $id = $this->service->storeNewPost();
      $postData = $this->service->getPostById($id)->getAttributes();
      $postData['post_type'] = GMZ_SERVICE_HOTEL;
      return $this->getView( $this->getFolderView('services.hotel.edit'), [
         'serviceData' => $postData,
         'title' => __('Add new hotel'),
         'new' => true
      ]);
   }*/

   /*public function allReviewView(){
      $allPosts = $this->commentService->getReviewsPagination(GMZ_SERVICE_HOTEL, 5);
      return $this->getView($this->getFolderView('services.hotel.review'), ['allPosts' => $allPosts]);
   }

   public function deleteHotelAction(Request $request){
      $response = $this->service->deletePost($request);
      return response()->json($response);
   }

   public function editHotelView($id){
      $postData = $this->service->storeTermData($id);
      if($postData) {
         $postData = $postData->getAttributes();
         $postData['post_type'] = GMZ_SERVICE_HOTEL;
         return $this->getView($this->getFolderView('services.hotel.edit'), [
            'serviceData' => $postData,
            'title' => __('Edit hotel'),
            'new' => false
         ]);
      }
      return response()->redirectTo(dashboard_url('all-hotels'));
   }

   public function allHotelView(Request $request){
      $this->service->deletePostTemp();
      $status = $request->get('status', '');
      $where = [];
      $post_status = admin_config( 'hotel_status');
      if(!empty($status) && in_array($status, array_keys($post_status))){
         $where['status'] = $status;
      }
      $allPosts = $this->service->getPostsPagination(10, $where);
      return $this->getView($this->getFolderView('services.hotel.all'), ['allPosts' => $allPosts]);
   }

   public function saveHotelAction(Request $request){
      $response = $this->service->savePost($request);
      return response()->json($response);
   }
   */
}