<?php

namespace App\Services;

use App\Repositories\Contracts\INotificationRepository;
use App\Services\Contracts\INotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function Symfony\Component\String\s;
use Illuminate\Support\Facades\Session;

class NotificationService extends AbstractService implements INotificationService {
	protected $repository;

	public function __construct( INotificationRepository $repository) {
		$this->repository = $repository;
	}

    public function getPostsPagination($number = 10, $where = []){
        return $this->repository->paginate($number, $where);
    }
}