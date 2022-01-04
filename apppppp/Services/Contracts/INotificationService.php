<?php
namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface INotificationService extends IBaseService {
    public function getPostsPagination($number, $where);
}

