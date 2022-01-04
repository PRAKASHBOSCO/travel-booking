<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\RoleUser;
use App\Repositories\Contracts\IRoleUserRepository;

class RoleUserRepository extends AbstractRepository implements IRoleUserRepository {
    protected $model = RoleUser::class;
}