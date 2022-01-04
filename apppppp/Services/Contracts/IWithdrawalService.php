<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IWithdrawalService extends IBaseService {

   public function getWithDrawalData($id = null);

   public function getWallet($id = null);

   public function withdrawalRequest(Request $request);

   public function withdrawalUpdateStatus(Request $request);

   public function getDataModal(Request $request);
}
