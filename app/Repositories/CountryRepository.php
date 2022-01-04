<?php

namespace App\Repositories;

use App\Models\Country;

use App\Repositories\Contracts\ICountryRepository;

class CountryRepository extends AbstractRepository implements ICountryRepository {
    protected $model = Country::class;
}