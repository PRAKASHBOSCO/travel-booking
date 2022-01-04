<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Earnings;
use App\Repositories\Contracts\ICommentRepository;
use App\Repositories\Contracts\IEarningsRepository;
use Illuminate\Database\Eloquent\Model;

class EarningsRepository extends AbstractRepository implements IEarningsRepository {

   protected $model = Earnings::class;

   public function __construct(Model $model)
   {
      parent::__construct($model);
   }

    public function totalEarnings($user_id = '')
    {
        // TODO: Implement totalEarnings() method.
        $model = new Earnings();
        $query = $model->newQuery();
        $query->selectRaw("SUM(total) as total_earnings, SUM(net_earnings) as total_net_earnings, SUM(balance) as total_balance,  SUM(total - net_earnings) as total_commission");
        if(!empty($user_id)){
        	$query->where('user_id', $user_id);
        }
	    return $query->first();
    }

}
