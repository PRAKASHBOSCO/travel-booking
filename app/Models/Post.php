<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'gmz_post';

	protected $fillable = [
		'post_title', 'post_slug', 'post_content', 'post_description', 'post_category', 'post_tag', 'thumbnail_id', 'status', 'author'
	];

    public function TermRelation()
    {
        return $this->hasMany(TermRelation::class,'post_id','id');
    }

    public function getPosts($args){
        $limit = $args['posts_per_page'];
        $query = $this->query();
        if(!empty($limit) && $limit != -1){
            $query->limit($limit);
        }
        return $query->orderBy($args['orderby'], $args['order'])->get();
    }

    public function getPost($post_id){
        return $this->query()->find($post_id);
    }
}
