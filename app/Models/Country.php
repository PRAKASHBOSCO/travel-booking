<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'gmz_country';

    protected $fillable = [
        'id','short_name','name','phonecode','updated_at','created_at','created_by','updated_by'
    ];




 public function getCountry($data)
    {
        $default = [
            'country' => ''
        ];

        $data = gmz_parse_args($data, $default);

        $query = $this->query();

        if (!empty($data['country'])) {
            $query->select(['gmz_country.*', 'gmz_country.country_id'])
                ->where('country_id', $data['country'])
                ->join('gmz_country', 'gmz_country.country_id', '=', "users.id", 'inner');
        }

        return $query->orderBy('id', 'ASC')->get();
    }
}




