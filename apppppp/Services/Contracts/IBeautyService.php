<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IBeautyService extends IBaseService
{
    public function getWishList($number, $wishlist);

   public function deletePostTemp();

   public function storeNewPost();

   public function getPostById($id);

   public function getFullPostById($id);

   public function savePost(Request $request);

   public function getPostsPagination($number, $where);

   public function deletePost(Request $request);

   public function getSearchResult(Request $request);

   public function getPostBySlug($slug);

   public function getSlotEmptyByDay(int $id, $unixtime);

   public function getCustomPriceByDay(int $id, $unixtime);

   public function addToCart(Request $request);
}

