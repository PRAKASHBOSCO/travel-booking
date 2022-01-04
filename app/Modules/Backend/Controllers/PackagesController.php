<?php

namespace App\Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ITestimonialsService;
use Illuminate\Http\Request;

class PackagesController extends Controller
{

  private $service;

    public function __construct(ITestimonialsService $_service) { $this->service = $_service;
    }

   function view_all(Request $request){
      $status = $request->get('status', '');
      $where = [];
      $post_status = admin_config( 'page_status');
      if(!empty($status) && in_array($status, array_keys($post_status))){
        $where['status'] = $status;
      }
      $allPosts = $this->service->getTestimonialsPagination(10, $where);
      return $this->getView($this->getFolderView('services.testimonials.all'), ['allPosts' => $allPosts]);
   }

   public function newTestimonials(Request $request)
   {
    // dd($request->all());
     
      $this->service->deleteTestimonialsTemp();
        $id = $this->service->storeNewTestimonials();
        $postData = $this->service->getPostById($id)->getAttributes();
         // dd($postData);


        $postData['post_type'] = 'Testimonials';
         // dd($postData);
       
        return $this->getView( $this->getFolderView('services.testimonials.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new testimonials'),
            'new' => true
        ]);
   }

    public function deleteTestimonialsAction(Request $request){
      $response = $this->service->deleteTestimonials($request);
      return response()->json($response);
    }

   public function editTestimonialsView ($id){ 
    $postData = $this->service->getPostById($id);



    if(!is_null($postData)) {
       $postData = $postData->getAttributes();
       $postData['post_type'] = 'Testimonials';
        return $this->getView($this->getFolderView('services.testimonials.edit'), [
                    'serviceData' => $postData,
                    'title' => __('Edit testimonials'),
                    'new' => true
                ]);

    }
    return response()->redirectTo(dashboard_url('all-testimonials'));
  }

  
    public function saveTestimonials(Request $request)
    {
      $response = $this->service->savePost($request);
       return response()->json($response);
      
    }

 
}
