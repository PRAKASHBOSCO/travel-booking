<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ISpaceAvailabilityRepository extends IBaseRepository{
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
    public function updateBookedData($check_in, $check_out, $object);
    public function removeCalendarItem($postID, $checkIn);
}