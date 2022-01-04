<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/26/20
 * Time: 13:35
 */

namespace App\Repositories\Contracts;


interface ITaxonomyRepository extends IBaseRepository
{
    public function getTaxonomyByName($taxonomy_name);
}