<?php
namespace App\Services;

use App\Repositories\Contracts\ITaxonomyRepository;
use App\Services\Contracts\ITaxonomyService;

class TaxonomyService extends AbstractService implements ITaxonomyService
{
    protected $repository;

    public function __construct(ITaxonomyRepository $repository)
    {
        $this->repository = $repository;
    }
}