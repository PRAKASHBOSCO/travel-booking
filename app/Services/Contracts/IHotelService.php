<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IHotelService extends IBaseService {
    public function getWishList($number, $wishlist);
	public function getPostsPagination($number = 10, $where = []);
	public function storeNewPost();
    public function deletePostTemp();
	public function getPostById($id);
	public function createSlug($data);
	public function savePost(Request $request);
	public function storeTermData($post_id);
    public function deletePost(Request $request);
    public function getSearchResult(Request $request);
    public function addToCart(Request $request);
    public function sendEnquiry(Request $request);
    public function getPostBySlug($slug);
}

