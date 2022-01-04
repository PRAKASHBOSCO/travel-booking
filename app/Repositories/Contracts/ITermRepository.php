<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/26/20
 * Time: 13:35
 */

namespace App\Repositories\Contracts;


interface ITermRepository extends IBaseRepository
{
    public function checkExistsByTitle($term_title, $taxonomy_id, $term_id = '', $like = false);
}