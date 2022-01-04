<?php

namespace App\Repositories;

use App\Models\Inclusions;

use App\Repositories\Contracts\IInclusionRepository;

class InclusionRepository extends AbstractRepository implements IInclusionRepository {
    protected $model = Inclusions::class;
}