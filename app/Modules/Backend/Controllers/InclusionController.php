<?php

namespace App\Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Contracts\IInclusionService;
use Illuminate\Http\Request;

class InclusionController extends Controller
{

	private $service;

    public function __construct(IInclusionService $_service) {
       $this->service = $_service;
    }

   function view_all(Request $request){
      $status = $request->get('status', '');
      $where = [];
      $post_status = admin_config( 'page_status');
      if(!empty($status) && in_array($status, array_keys($post_status))){
        $where['status'] = $status;
      }
      $allPosts = $this->service->getInclusionPagination(10, $where);
      return $this->getView($this->getFolderView('services.inclusion.all'), ['allPosts' => $allPosts]);
   }

   public function newInclusion(Request $request)
   {
    // dd($request->all());
      $this->service->deleteInclusionTemp('Forum');
        $id = $this->service->storeNewInclusion('Forum');
        $postData = $this->service->getPostById($id)->getAttributes();


        $postData['post_type'] = 'Inclusion';
         // dd($postData);
       
        return $this->getView( $this->getFolderView('services.inclusion.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new inclusion'),
            'new' => true
        ]);
   }

    public function deleteInclusionAction(Request $request){
      $response = $this->service->deleteInclusion($request);
      return response()->json($response);
    }

   public function editInclusionView ($id){ 
    $postData = $this->service->getPostById($id);



    if(!is_null($postData)) {
       $postData = $postData->getAttributes();
       $postData['post_type'] = 'Forum';
        return $this->getView($this->getFolderView('services.inclusion.edit'), [
                    'serviceData' => $postData,
                    'title' => __('Edit inclusion'),
                    'new' => true
                ]);

    }
    return response()->redirectTo(dashboard_url('all-inclusion'));
  }

  
    public function saveInclusion(Request $request)
    {
      $response = $this->service->savePost($request);
       return response()->json($response);
      
    }

 
}
