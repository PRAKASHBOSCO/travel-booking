<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\TermRelation;
use App\Repositories\Contracts\ITermRelationRepository;

class TermRelationRepository extends AbstractRepository implements ITermRelationRepository {
    protected $model = TermRelation::class;
}