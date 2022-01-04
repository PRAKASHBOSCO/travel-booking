<?php

namespace App\Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Contracts\IEarningsReportService;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class EarningsReportController extends Controller
{

   private $service;

   public function __construct(IEarningsReportService $_service)
   {
      $this->service = $_service;
   }

   public function analyticsView($id = null)
   {
      if(empty($id)){
         if(is_admin()){
            $id = -1;
         }else{
            $id = get_current_user_id();
         }
      }
      return $this->getView($this->getFolderView('earnings.analytics'), ['userID' => $id]);
   }

   public function partnerEarningsView()
   {
      $data = $this->service->getEarningsData();
      return $this->getView($this->getFolderView('earnings.partner-earnings'), ['data' => $data]);
   }

   public function getWidget(Request $request){
      $response = $this->service->getWidget($request);
      if ($response){
         $widget = $response['widget'];
         $data = $response['data'];
         $view_part = 'widget.'.$widget;
         return view($this->getFolderView($view_part),['data'=>$data]);
      }
      return false;
   }
}