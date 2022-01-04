<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories\Contracts;

interface IMenuStructureRepository extends IBaseRepository{
    public function getStructureByMenuID($menu_id);
    public function resetMenuStructure($menu_id);
}