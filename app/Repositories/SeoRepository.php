<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Seo;
use App\Repositories\Contracts\ISeoRepository;
use Illuminate\Database\Eloquent\Model;

class SeoRepository extends AbstractRepository implements ISeoRepository {
    protected $model = Seo::class;

    public function __construct(Model $model)
    {
        $this->model = new Seo();
        parent::__construct($model);
    }
}