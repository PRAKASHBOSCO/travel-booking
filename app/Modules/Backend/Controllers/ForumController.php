<?php

namespace App\Modules\Backend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
    function fun(){
    	$comment       = new \App\Models\YourNewModel();
		echo $comment_count = $comment->getCommentCountByPostID( '13', 'post');
    }
}
