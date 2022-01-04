<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories\Contracts;

interface IOrderRepository extends IBaseRepository
{
  public function getOrderItemsGroupDate($post_id, $start_date, $end_date, $post_type);

  public function getOrderItemsWithTime($post_id, $check_in, $check_out, $startTime, $endTime, $post_type, $booking_type);

   public function getOrderItems($post_id, $start_date, $end_date, $post_type);

   public function appendChangeLog($id, $user, $action);

   public function getRecentDeals($userID, $limit);

   public function getRevenue($userID, $startDate, $endDate);

   public function getMinDate($userID);

   public function whereWithLimit($where, $limit);

   public function getOrderPaginate($number, $whereRaw, $orderBy, $order, $withTerm = false);

   public function searchPaginate($number, $string, $userID = false);

   public function totalOrders($user_id = '');

   public function getStatisticsPerDay($limit, $user_id = '');

   public function getPendingOrders($user_id = '');
}