<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TorMorten\Eventy\Facades\Eventy;

class Packages extends Model
{
    protected $table = 'gmz_packages';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable()
    {
        $this->fillable = Eventy::filter('gmz_packages_fillable', [
            'post_title', 'post_slug', 'post_content', 'location_lat', 'location_lng', 'location_address', 'location_country', 'location_zoom', 'thumbnail_id', 'gallery', 'booking_form', 'extra_services', 'enable_cancellation', 'cancel_before', 'cancellation_detail', 'rating', 'is_featured', 'video', 'author', 'status', 'adult_price', 'children_price', 'infant_price', 'group_size', 'duration', 'booking_type', 'external_link', 'tour_type', 'tour_include', 'tour_exclude', 'highlight', 'itinerary', 'faq'
        ]);
    }

    public function TermRelation()
    {
        return $this->hasMany(TermRelation::class,'post_id','id');
    }

    public function updateTour($post_id, $data)
    {
        return $this->query()->where('id', $post_id)->update($data);
    }

    public function getPost($post_id){
        return $this->query()->find($post_id);
    }

    public function getPosts($args){
        $limit = $args['posts_per_page'];
        $query = $this->query();
        $query->selectRaw('*');
        if(!empty($limit) && $limit != -1){
            $query->limit($limit);
        }
        if(!empty($args['post_not_in'])){
            $query->whereNotIn('id', $args['post_not_in']);
        }
        if(!empty($args['nearby'])){
            $lat = $args['nearby']['lat'];
            $lng = $args['nearby']['lng'];
            $distance = $args['nearby']['distance'];
            $query->selectRaw("( 6371 * acos( cos( radians({$lat}) ) * cos( radians( location_lat ) ) * cos( radians( location_lng ) - radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( location_lat ) ) ) ) AS distance");
            $query->orHavingRaw("distance <= " . $distance);
            $query->orderBy('distance', 'ASC');
        }else{
            $query->orderBy($args['orderby'], $args['order']);
        }
        return $query->get();
    }
}