<?php
namespace App\Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ICommentService;
use Illuminate\Http\Request;

class CommentController extends Controller{
    private $service;

    public function __construct(ICommentService $_service) {
        $this->service = $_service;
    }

    public function addCommentAction(Request $request){
        $response = $this->service->addComment($request);
        return response()->json($response);
    }
}