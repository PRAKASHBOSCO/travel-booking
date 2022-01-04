<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
     protected $table = 'gmz_testimonials';

    protected $fillable = [
        'name', 'designation', 'description', 'profile_img','package_id', 'status','updated_at','created_at','created_by','updated_by'
    ];
}
