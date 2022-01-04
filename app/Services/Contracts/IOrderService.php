<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IOrderService extends IBaseService {
   public function checkOut(Request $request);
	public function getPostsPagination($number = 10, $where = []);
	public function getOrderDetail(Request $request);
	public function getOrderManagement($post_type, Request $request, $my_order = false);
}

