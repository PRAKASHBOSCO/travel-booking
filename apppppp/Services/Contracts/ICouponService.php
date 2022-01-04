<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface ICouponService extends IBaseService {
    public function getPostsPagination($number = 10, $where = []);
    public function newCoupon(Request $request);
    public function getCouponForm(Request $request);
    public function editCoupon(Request $request);
    public function deleteCoupon(Request $request);
    public function changeStatus(Request $request);
    public function applyCoupon(Request $request);
    public function removeCoupon(Request $request);
}

