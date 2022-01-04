<?php

namespace App\Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ICategoriesService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

	private $service;

    public function __construct(ICategoriesService $_service) {
       $this->service = $_service;
    }

   function view_all(Request $request){
      $status = $request->get('status', '');
      $where = [];
      $post_status = admin_config( 'page_status');
      if(!empty($status) && in_array($status, array_keys($post_status))){
        $where['status'] = $status;
      }
      $allPosts = $this->service->getCategoriesPagination(10, $where);
      return $this->getView($this->getFolderView('services.categories.all'), ['allPosts' => $allPosts]);
   }

   public function newCategory(Request $request)
   {
    // dd($request->all());
      $this->service->deleteCategoryTemp('Forum');
        $id = $this->service->storeNewCategory('Forum');
        $postData = $this->service->getPostById($id)->getAttributes();


        $postData['post_type'] = 'Forum';
         // dd($postData);
       
        return $this->getView( $this->getFolderView('services.categories.edit'), [
            'serviceData' => $postData,
            'title' => __('Add new forum category'),
            'new' => true
        ]);
   }

    public function deleteCategoryAction(Request $request){
      $response = $this->service->deleteCategory($request);
      return response()->json($response);
    }

   public function editCategoryView ($id){ 
    $postData = $this->service->getPostById($id);



    if(!is_null($postData)) {
       $postData = $postData->getAttributes();
       $postData['post_type'] = 'Forum';
        return $this->getView($this->getFolderView('services.categories.edit'), [
                    'serviceData' => $postData,
                    'title' => __('Edit forum category'),
                    'new' => true
                ]);

    }
    return response()->redirectTo(dashboard_url('all-forum-categories'));
  }

  
    public function saveCategory(Request $request)
    {
      $response = $this->service->savePost($request);
       return response()->json($response);
      
    }

 
}
