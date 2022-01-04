<?php
namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface ICommentService extends IBaseService {
    public function addComment(Request $request);
    public function getReviewsPagination($post_type, $number);
    public function changeStatus(Request $request);
    public function deleteItem(Request $request);
}

