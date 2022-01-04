<?php

namespace App\Repositories\Contracts;


interface IEarningsRepository extends IBaseRepository
{
    public function totalEarnings($user_id = '');
}