<?php

namespace App\Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ICountriesService;
use Illuminate\Http\Request;

class CountriesController extends Controller
{

  private $service;

    public function __construct(ICountriesService $_service) { $this->service = $_service;
    }

   function view_all(Request $request){
      $status = $request->get('status', '');
      $where = [];
      $post_status = admin_config( 'page_status');
      if(!empty($status) && in_array($status, array_keys($post_status))){
        $where['status'] = $status;
      }
      $allPosts = $this->service->getCountriesPagination(10, $where);
      return $this->getView($this->getFolderView('services.countries.all'), ['allPosts' => $allPosts]);
   }

   public function newCountries(Request $request)
   {
    // dd($request->all());
      $this->service->deleteCountryTemp();
        $id = $this->service->storeNewCountry();
        $postData = $this->service->getPostById($id)->getAttributes();
         // dd($postData);


        $postData['post_type'] = 'Countries';
         // dd($postData);
       
        return $this->getView( $this->getFolderView('services.countries.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new testimonials'),
            'new' => true
        ]);
   }

    public function deleteCountriesAction(Request $request){
      $response = $this->service->deleteCountries($request);
      return response()->json($response);
    }

   public function editCountriesView ($id){ 
    $postData = $this->service->getPostById($id);



    if(!is_null($postData)) {
       $postData = $postData->getAttributes();
       $postData['post_type'] = 'Countries';
        return $this->getView($this->getFolderView('services.countries.edit'), [
                    'serviceData' => $postData,
                    'title' => __('Edit countries'),
                    'new' => true
                ]);

    }

    return response()->redirectTo(dashboard_url('all-countries'));
  }

  
    public function saveCountries(Request $request)
    {
      $response = $this->service->savePost($request);
       return response()->json($response);
      
    }

 
}
