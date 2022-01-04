<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $table= 'gmz_states';
    protected $fillable= [

       'id','country_id','state_name','status','created_at','created_by','updated_by','updated_at'

    ];


    public function getState($data)
    {
        $default = [
            'state' => ''
        ];

        $data = gmz_parse_args($data, $default);

        $query = $this->query();

        if (!empty($data['state'])) {
            $query->select(['gmz_states.*', 'gmz_states.state_id'])
                ->where('state_id', $data['state'])
                ->join('gmz_state', 'gmz_state.state_id', '=', "users.id", 'inner');
        }

        return $query->orderBy('id', 'ASC')->get();
    }
}
