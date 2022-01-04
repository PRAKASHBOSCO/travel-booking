<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\IUserRepository;

class UserRepository extends AbstractRepository implements IUserRepository {
    protected $model = User::class;

    public function getListPartner($number) {
        return $this->model->select(['users.*', 'role_user.role_id'])->where('request', 1)
            ->whereIn('role_id', [2, 3])
            ->join('role_user', 'role_user.user_id', '=', "users.id", 'inner')
            ->orderBy('users.id', 'DESC')->paginate($number);
    }
}