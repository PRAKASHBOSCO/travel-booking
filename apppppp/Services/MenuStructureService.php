<?php

namespace App\Services;

use App\Repositories\Contracts\IMenuStructureRepository;
use App\Services\Contracts\IMenuStructureService;

class MenuStructureService extends AbstractService implements IMenuStructureService {
	protected $repository;

	public function __construct( IMenuStructureRepository $repository) {
		$this->repository       = $repository;
	}
}