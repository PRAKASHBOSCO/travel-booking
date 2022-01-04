<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\BeautyAvailability;
use App\Repositories\Contracts\IBeautyAvailabilityRepository;

class BeautyAvailabilityRepository extends AbstractRepository implements IBeautyAvailabilityRepository {
    protected $model = BeautyAvailability::class;

    public function checkAvailability($post_id, $check_in, $check_out)
    {
        $checkAvail = $this->model->where('post_id', $post_id)
            ->where('check_in', '>=', $check_in)
            ->where('check_out', '<=', $check_out)
            ->where('status', 'unavailable')
            ->get();

        if(!$checkAvail->isEmpty()){
            return false;
        }else{
            return true;
        }
    }

    public function insertOrUpdate( $data ) {
	    $checkExitst = $this->model->where([
	    	'post_id' => $data['post_id'],
	    	'check_in' => $data['check_in'],
	    	'check_out' => $data['check_out'],
	    ])->get();

	    if($checkExitst->count() > 0){
	    	$this->update($checkExitst[0]['id'], $data);
	    }else{
	    	$this->create($data);
	    }
    }

	public function getDataAvailability( $post_id, $check_in, $check_out ) {
    	$data = $this->model->where('post_id', $post_id)
		    ->where('check_in', '>=', $check_in)
		    ->where('check_out', '<=', $check_out)
		    ->get();
    	return $data;
    }

   public function getCustomPriceByDay(int $id, $unixtime)
   {
      $data = $this->model->where('post_id', $id)
         ->where('check_in', $unixtime)
         ->where('status', 'available')
         ->first();
      return $data;
   }
}