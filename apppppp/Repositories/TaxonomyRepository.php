<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Taxonomy;
use App\Repositories\Contracts\ITaxonomyRepository;

class TaxonomyRepository extends AbstractRepository implements ITaxonomyRepository {
    protected $model = Taxonomy::class;

    public function getTaxonomyByName( $taxonomy_name ) {
        return $this->model->where('taxonomy_name', $taxonomy_name)->get()->first();
    }
}