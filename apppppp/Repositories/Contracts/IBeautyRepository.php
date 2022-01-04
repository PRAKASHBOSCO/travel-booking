<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface IBeautyRepository extends IBaseRepository{

	public function checkAvailability(int $unixtime, $id = null);

   public function getAgentByService(int $id);

   public function getSearchResult($params);

    public function getWishlist($number, $wishlist);

    public function getAllPostIDs($author);
}