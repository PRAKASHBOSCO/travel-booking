<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface IAgentAvailabilityRepository extends IBaseRepository
{
   /**
    * @param $post_id
    * @param $check_in
    * @param $check_out
    *
    * @return Collection
    */
   public function getDataAvailability($post_id, $check_in, $check_out, $agent_service);

   public function insertOrUpdate($data);

   public function checkAvailability($post_id, $check_in, $check_out);

   public function getSlotBooked(array $agent_id);

   public function updateBookedData(int $check_in, int $check_out,int $agent_id, int $order_id, string $status);
}