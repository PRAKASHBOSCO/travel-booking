<?php
namespace App\Modules\Frontend\Controllers;

use App\Services\Contracts\IWishlistService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller{
    private $service;

    public function __construct(IWishlistService $service){
        $this->service = $service;
    }

    public function addWishlistAction(Request $request){
        $response = $this->service->addWishlist($request);
        return response()->json($response);
    }
}