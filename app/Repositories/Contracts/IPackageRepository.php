<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface IPackageRepository extends IBaseRepository{
    /**
     * @param $data
     * @return LengthAwarePaginator
     */
    public function getSearchResult($data);

    public function getWishlist($number, $wishlist);

    public function getAllPostIDs($author);
}