<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
namespace App\Modules\Frontend\Controllers;

use App\Services\Contracts\IUserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{
    private $service;

    public function __construct(IUserService $service){
        $this->service = $service;
    }

    public function loginView(Request $request){
		return view('Frontend::user.login');
	}

	public function becomeAPartnerAction(Request $request){
        $response = $this->service->partnerRegister($request);
        return response()->json($response);
    }

    public function registerView(Request $request){
        return view('Frontend::user.register');
    }

    public function showLinkRequestForm(Request $request){
        return view('Frontend::user.request-form-password');
    }

	public function showResetForm (Request $request, $token){
		return view('Frontend::user.reset-form-password', ['token' => $token, 'email' => $request->get('email')]);
	}
}