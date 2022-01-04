<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Term;
use App\Repositories\Contracts\ITermRepository;

class TermRepository extends AbstractRepository implements ITermRepository
{
   protected $model = Term::class;

   public function paginate($number = 10, $where = [], $withTerm = false)
   {
      $this->model = new Term();
      $query = $this->model->query();
      if (!empty($where)) {
         $query->where($where);
      }
      if ($withTerm) {
         $query->with('TermRelation.Term.Taxonomy');
      }
      $query->with('children');
      $query->orderBy($this->model->getKeyName(), 'DESC');
      $a = $query->paginate($number);
      return $a;
   }

   public function checkExistsByTitle($term_title, $taxonomy_id, $term_id = '', $like = false)
   {
      if ($like) {
         $res = $this->model->where('term_title', 'LIKE', "%{$term_title}%")->where('taxonomy_id', $taxonomy_id)->get()->first();
      } else {
         $res = $this->model->where('term_title', $term_title)->where('taxonomy_id', $taxonomy_id)->get()->first();
      }
      if (is_null($res)) {
         return false;
      } else {
         if (!empty($term_id)) {
            if ($res->id == $term_id) {
               return false;
            } else {
               return true;
            }
         } else {
            return true;
         }
      }
   }
}