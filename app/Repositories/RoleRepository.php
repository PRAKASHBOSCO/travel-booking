<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Contracts\IRoleRepository;

class RoleRepository extends AbstractRepository implements IRoleRepository {
    protected $model = Role::class;
}