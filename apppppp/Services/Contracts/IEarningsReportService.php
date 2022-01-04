<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IEarningsReportService extends IBaseService {
   public function getEarningsData();
   public function getWidget(Request $request);
}
