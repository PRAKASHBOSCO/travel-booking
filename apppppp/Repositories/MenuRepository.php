<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Menu;
use App\Repositories\Contracts\IMenuRepository;

class MenuRepository extends AbstractRepository implements IMenuRepository {
    protected $model = Menu::class;
}