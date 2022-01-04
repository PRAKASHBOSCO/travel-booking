<?php
namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface IRoomService extends IBaseService {
    public function addRoomAvailability($post_data);
	public function getPostsPagination($number = 10, $where = []);
	public function storeNewPost($hotel_id);
    public function deletePostTemp($hotel_id);
	public function getPostById($id);
	public function createSlug($data);
	public function savePost(Request $request);
	public function storeTermData($post_id);
    public function deletePost(Request $request);
    public function searchRoom(Request $request);
    public function roomDetail(Request $request);
    public function roomRealPrice(Request $request);
}

