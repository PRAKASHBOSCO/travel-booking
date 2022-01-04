<?php

namespace App\Repositories;

use App\Models\Categories;

use App\Repositories\Contracts\ICategoriesRepository;

class CategoriesRepository extends AbstractRepository implements ICategoriesRepository {
    protected $model = Categories::class;
}