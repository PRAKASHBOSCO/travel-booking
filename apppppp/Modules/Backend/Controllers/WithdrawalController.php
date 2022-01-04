<?php

namespace App\Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Contracts\IWithdrawalService;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{

   private $service;

   public function __construct(IWithdrawalService $_service)
   {
      $this->service = $_service;
   }

   public function withdrawalView($id = null)
   {
      $wallet = $this->service->getWallet($id);
      $data = $this->service->getWithDrawalData($id);
      return $this->getView($this->getFolderView('earnings.withdrawal'), ['wallet' => $wallet, 'data' => $data]);
   }

   public function withdrawalRequest(Request $request)
   {
      return $this->service->withdrawalRequest($request);
   }

   public function withdrawalUpdateStatus(Request $request){
      return $this->service->withdrawalUpdateStatus($request);
   }

   public function getDataModal(Request $request){
       return $this->service->getDataModal($request);
   }

}