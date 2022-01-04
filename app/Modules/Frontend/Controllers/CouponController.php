<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 12/8/20
 * Time: 17:37
 */

namespace App\Modules\Frontend\Controllers;


use App\Http\Controllers\Controller;
use App\Services\Contracts\ICouponService;
use Illuminate\Http\Request;

class CouponController extends Controller {
	private $service;

	public function __construct(ICouponService $service) {
		$this->service = $service;
	}

    public function removeCouponAction(Request $request){
        $response = $this->service->removeCoupon($request);
        return response()->json($response);
    }

    public function applyCouponAction(Request $request){
        $response = $this->service->applyCoupon($request);
        return response()->json($response);
    }
}