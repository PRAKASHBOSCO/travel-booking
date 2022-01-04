<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\MenuStructure;
use App\Repositories\Contracts\IMenuStructureRepository;

class MenuStructureRepository extends AbstractRepository implements IMenuStructureRepository {
    protected $model = MenuStructure::class;

    public function resetMenuStructure($menu_id) {
        if(is_multi_language()) {
            return $this->model->where('menu_id', $menu_id)->where('menu_lang', get_current_language())->delete();
        }else{
            return $this->model->where('menu_id', $menu_id)->delete();
        }
    }

    public function getStructureByMenuID($menu_id) {
        return $this->model->where('menu_id', $menu_id)
            ->where('menu_lang', get_current_language())
            ->get();
    }
}