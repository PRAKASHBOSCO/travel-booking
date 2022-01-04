<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'gmz_wishlist';

    protected $fillable = [
        'post_id', 'post_type', 'author'
    ];
}
