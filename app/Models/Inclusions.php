<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inclusions extends Model
{
    protected $table = 'gmz_inclusions';

    protected $fillable = [
        'title', 'icon_img_upload','status','updated_at','created_at','created_by','updated_by'
    ];

    // protected $primaryKey = 'category_id';
}
