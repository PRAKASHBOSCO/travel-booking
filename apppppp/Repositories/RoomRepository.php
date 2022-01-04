<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Room;
use App\Repositories\Contracts\IRoomRepository;
use Illuminate\Database\Eloquent\Model;

class RoomRepository extends AbstractRepository implements IRoomRepository {
    protected $model = Room::class;

    public function __construct(Model $model)
    {
        parent::__construct($model);
        $this->model = new Room();
    }

    public function getRooms($data){
        $hotel_id = $data['hotel_id'];
        $number_room = $data['number_room'];
        $adult = $data['adult'];
        $children = $data['children'];

        $query = $this->model->query();
        $query->where("hotel_id", $hotel_id);
        $query->where('number_of_adult', '>=', $adult);
        $query->where('number_of_children', '>=', $children);
        $query->where('number_of_room', '>=', $number_room);
        if(!empty($data['unavailable_id'])) {
            $query->whereNotIn('id', $data['unavailable_id']);
        }

        return $query->get();
    }
}