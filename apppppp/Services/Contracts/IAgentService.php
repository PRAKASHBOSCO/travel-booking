<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IAgentService extends IBaseService {
   public function deletePostTemp();
   public function storeNewPost($service);
   public function getPostById($id);
   public function savePost(Request $request);
   public function getPostsPagination($number, $where);
   public function storeTermData($id);
   public function deletePost(Request $request);
}

