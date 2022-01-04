<?php
namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface ISeoService extends IBaseService {
   public function saveSettings(Request $request);
}

