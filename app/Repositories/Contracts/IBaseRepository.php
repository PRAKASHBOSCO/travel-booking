<?php

namespace App\Repositories\Contracts;

interface IBaseRepository
{
   public function all($order_by = '', $order = 'DESC');

   public function paginateNew($number = 10, $where = [], $withTerm = false);

   public function paginate($number = 10, $where = [], $withTerm = false);

   public function find($id);

   public function findOneBy($criteria);

   public function findOrFail($id);

   public function whereRaw($whereRaw, $first = false);

   public function where($where, $first = false);

   public function save($data);

   public function create($data);

   public function insert(array $data);

   public function update($id, $data);

   public function updateByWhere($where, $attributes = []);

   public function delete($id);

   public function deleteByWhere($where);

   public function deleteByWhereRaw($whereRaw);

   public function truncate();

   public function getRelatedSlugs($slug, $id = 0);

   public function whereIn($column, array $array);
}