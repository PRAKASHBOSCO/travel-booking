<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Option;
use App\Repositories\Contracts\IOptionRepository;

class OptionRepository extends AbstractRepository implements IOptionRepository {
    protected $model = Option::class;

    public function getOption($key) {
        $data = $this->model->where('name', $key)->get()->first();
        return $data;
    }
}