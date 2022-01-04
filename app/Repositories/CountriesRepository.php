<?php

namespace App\Repositories;

use App\Models\Countries;

use App\Repositories\Contracts\ICountriesRepository;

class CountriesRepository extends AbstractRepository implements ICountriesRepository {
    protected $model = Countries::class;
}