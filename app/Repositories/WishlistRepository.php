<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Wishlist;
use App\Repositories\Contracts\IWishlistRepository;
use Illuminate\Database\Eloquent\Model;

class WishlistRepository extends AbstractRepository implements IWishlistRepository {
    protected $model = Wishlist::class;

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}