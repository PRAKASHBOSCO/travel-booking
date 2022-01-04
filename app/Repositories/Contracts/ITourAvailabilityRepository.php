<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ITourAvailabilityRepository extends IBaseRepository{
	/**
	 * @param $post_id
	 * @param $check_in
	 * @param $check_out
	 *
	 * @return Collection
	 */
	public function getDataAvailability($post_id, $check_in, $check_out);
	public function getDataAvailabilityForCalendar($post_id, $check_in, $check_out);
	public function insertOrUpdate($data);
	public function checkAvailability($post_id, $check_in, $check_out);
	public function getListUnavailable($data);
	public function updateBookedData($check_in, $check_out, $object, $adult, $children);
    public function removeCalendarItem($postID, $checkIn);
}