<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Coupon;
use App\Repositories\Contracts\ICouponRepository;

class CouponRepository extends AbstractRepository implements ICouponRepository {
    protected $model = Coupon::class;

    public function checkCouponExists($coupon_code, $date){
        $model = new Coupon();
        $data = $model->query()->where('code', $coupon_code)->whereRaw("{$date} >= start_date AND {$date} <= end_date")->where('status', 'publish')->get()->first();
        return $data;
    }

    public function checkExistsByTitle($coupon_id, $coupon_code){
        $data = $this->model->where('id', '<>', $coupon_id)->where('code', $coupon_code)->get()->first();
        if(!is_null($data)){
            return true;
        }else{
            return false;
        }
    }
}