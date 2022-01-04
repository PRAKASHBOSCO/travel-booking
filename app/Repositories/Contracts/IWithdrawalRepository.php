<?php

namespace App\Repositories\Contracts;


interface IWithdrawalRepository extends IBaseRepository
{
    public function sumByWhere($column, $where = null);
    public function countByWhere($where = null);
}