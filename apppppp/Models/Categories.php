<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'gmz_categories';

    protected $fillable = [
        'category_name', 'category_slug', 'category_type', 'parent', 'category_status','updated_at','created_at','created_by','created_by'
    ];

    // protected $primaryKey = 'category_id';
}
