<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IPostService extends IBaseService {
    public function getPostsPagination($number = 10, $where = []);
    public function storeNewPost();
    public function deletePostTemp();
    public function getPostById($id);
    public function createSlug($data);
    public function savePost(Request $request);
    public function storeTermData($post_id);
    public function deletePost(Request $request);
    public function getPostBySlug($slug);
    public function getArchivePagination($number, $where);
}

