<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IWishlistService extends IBaseService {
   public function addWishlist(Request $request);
}

