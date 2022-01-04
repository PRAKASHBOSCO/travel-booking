<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Agent;
use App\Repositories\Contracts\IAgentRepository;
use Illuminate\Database\Eloquent\Model;

class AgentRepository extends AbstractRepository implements IAgentRepository {
    protected $model = Agent::class;

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

   public function getAgentAvailableById(array $availableAgents)
   {
      $this->model = new Agent();
      $query = $this->model->newQuery();
      $table_name = $this->model->getTable();
      $query->selectRaw("{$table_name}.*, aa.check_in, aa.check_out");
      $query->leftJoin('gmz_agent_availability AS aa', 'gmz_agent.id', 'aa.post_id');
      $query->where('aa.status','booked');
      $query->whereIn("{$table_name}.id", $availableAgents);
      $result = $query->get();
      return $result->toArray();
   }
}