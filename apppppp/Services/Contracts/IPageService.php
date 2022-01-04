<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IPageService extends IBaseService {
    public function getPostsPagination($number = 10, $where = []);
    public function storeNewPost();
    public function deletePostTemp();
    public function getPostById($id);
    public function createSlug($data);
    public function savePost(Request $request);
    public function deletePage(Request $request);
	public function getPostBySlug($slug);
	public function sendContact(Request $request);
}

