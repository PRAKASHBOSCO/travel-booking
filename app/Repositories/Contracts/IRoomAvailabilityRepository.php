<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface IRoomAvailabilityRepository extends IBaseRepository{
	/**
	 * @param $post_id
	 * @param $check_in
	 * @param $check_out
	 *
	 * @return Collection
	 */
	public function getDataAvailability($post_id, $check_in, $check_out);
	public function insertOrUpdate($data);
	public function checkAvailability($post_id, $check_in, $check_out);
	public function getHotelUnavailable($start, $end, $number_room, $number_adult, $number_child);
	public function getRoomUnavailable($params);
	public function getNumberRoomAvailability($params);
	public function checkAvailabilityWithGuest($room_id, $check_in, $check_out, $number, $adult, $children);
	public function updateBookedData($check_in, $check_out, $rooms);
	public function removeCalendarItem($postID, $checkIn);

}