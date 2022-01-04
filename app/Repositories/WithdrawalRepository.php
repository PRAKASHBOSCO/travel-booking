<?php

namespace App\Repositories;

use App\Models\Withdrawal;
use App\Repositories\Contracts\IWithdrawalRepository;
use Illuminate\Database\Eloquent\Model;

class WithdrawalRepository extends AbstractRepository implements  IWithdrawalRepository{

   protected $model = Withdrawal::class;

   public function __construct(Model $model)
   {
      parent::__construct($model);
   }

    public function sumByWhere($column, $where = null)
    {
        $model = new Withdrawal();
        $query = $model->newQuery();
        $query->selectRaw("SUM({$column}) AS sum");
        if(!empty($where)){
            $query->where($where);
        }
        return $query->first();
    }

    public function countByWhere($where = null)
    {
        $model = new Withdrawal();
        $query = $model->newQuery();
        $query->selectRaw("COUNT(*) AS count");
        if(!empty($where)){
            $query->where($where);
        }
        return $query->first();
    }
}
