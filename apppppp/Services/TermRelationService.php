<?php
namespace App\Services;

use App\Repositories\Contracts\ITermRelationRepository;
use App\Services\Contracts\ITermRelationService;

class TermRelationService extends AbstractService implements ITermRelationService
{
    protected $repository;

    public function __construct(ITermRelationRepository $repository)
    {
        $this->repository = $repository;
    }
}