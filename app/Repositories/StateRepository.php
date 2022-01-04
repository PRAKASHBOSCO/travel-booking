<?php

namespace App\Repositories;

use App\Models\States;

use App\Repositories\Contracts\IStateRepository;

class StateRepository extends AbstractRepository implements IStateRepository {
    protected $model = States::class;
}