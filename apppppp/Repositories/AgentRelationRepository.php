<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Agent;
use App\Models\AgentRelation;
use App\Repositories\Contracts\IAgentRelationRepository;
use App\Repositories\Contracts\IAgentRepository;
use Illuminate\Database\Eloquent\Model;

class AgentRelationRepository extends AbstractRepository implements IAgentRelationRepository {
    protected $model = AgentRelation::class;

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

}