<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories\Contracts;

interface ICouponRepository extends IBaseRepository{
    public function checkExistsByTitle($coupon_id, $coupon_code);
    public function checkCouponExists($coupon_code, $date);
}