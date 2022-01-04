<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 11/28/2020
 * Time: 9:35 PM
 */

namespace App\Modules\Backend\Controllers;


use App\Http\Controllers\Controller;
use App\Services\Contracts\IUserService;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller {
	private $service;

	public function __construct(IUserService $_service) {
		$this->service = $_service;
	}

	public function approvePartnerAction(Request $request){
        $reponse = $this->service->approvePartner($request);
        return response()->json($reponse);
    }

    public function allPartnerView(){
        $allUsers = $this->service->getPartnerPagination(10);
        // dd($allUsers);
        return $this->getView($this->getFolderView('user.partner-request'), ['allUsers' => $allUsers]);
    }

    public function newUserAction(Request $request){
        $reponse = $this->service->newUser($request);
        return response()->json($reponse);
    }

    public function getUserFormAction(Request $request){
        $response = $this->service->getUserForm($request);
        return response()->json($response);
    }

    public function editUserAction(Request $request){
        $response = $this->service->editUser($request);
        return response()->json($response);
    }

    public function deleteUserAction(Request $request){
        $response = $this->service->deleteUser($request);
        return response()->json($response);
    }

	public function allUsersView(){
        //$allUsers = $this->service->getUsersPagination(10);
        //dd($allUsers);
     

       $allUsers= DB::table('users as u')
            ->leftJoin('gmz_country as c', 'u.country_name','=','c.id')
            ->leftJoin('gmz_states as s' ,'u.state_name','=','s.id')
            ->select('u.*','c.name as country_name', 's.name as state_name')
            ->orderBy('u.id', 'DESC')
            ->paginate(10);
            
         //dd($allUsers);  
        return $this->getView($this->getFolderView('user.all'), ['allUsers' => $allUsers]);
    }

	public function updateProfileAction(Request $request){

        // $allUsers= DB::table('users as u')
        //     ->leftJoin('title as t', 'u.title_id','=','t.id')
        //     ->select('u.*','t.title_name as country_name')
        //     ->orderBy('u.id', 'DESC')
        //     ->updateProfile($request);
		$response = $this->service->updateProfile($request);
        // dd($response);
		return response()->json($response);
	}

	public function profileView(Request $request){
	    $action = $request->get('action');
	    if(!empty($action) && is_customer()){
            $res = $this->service->upgradePartner($action);
            if($res == 1){
                return redirect()->to(dashboard_url('profile'))->with('profile_message', __('Your request has been sent. Please wait administrator review it.'));
            }elseif($res == 2){
                return redirect()->to(dashboard_url('profile'))->with('profile_message', __('Your cancel request has been sent. Thank you.'));
            }
        }
		$user = get_user_data();
		return $this->getView($this->getFolderView('user.profile'), ['data' => $user]);
	}
}