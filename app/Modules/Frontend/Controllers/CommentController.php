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
        // dd($request->all());
        $response = $this->service->addComment($request);
        // dd($response);
        return response()->json($response);
    }
}