<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
     protected $table = 'gmz_countries';

    protected $fillable = [
        'country_name' , 'status','updated_at','created_at','created_by','updated_by'
    ];
}
