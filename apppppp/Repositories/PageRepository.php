<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Page;
use App\Repositories\Contracts\IPageRepository;

class PageRepository extends AbstractRepository implements IPageRepository {
    protected $model = Page::class;
}