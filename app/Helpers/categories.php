<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('get_categories_recursive')) {
   function get_categories_recursive($res = [], $terms, $level = 0, $with_depth = true)
   {
      if (!$terms->isEmpty()) {
         foreach ($terms as $key => $item) {
            if ($level > 0 && $with_depth) {
               $depth_html = '';
               for ($i = 0; $i < $level; $i++) {
                  $depth_html .= '---';
               }
               $depth_html .= ' ';
            } else {
               $depth_html = '';
            }
            $res[$item->id] = $depth_html . get_translate($item->term_title);
            $relation = $item->getRelations();
            $child = $relation['children'];
            if (!$child->isEmpty()) {
               $new_level = $level + 1;
               $res = $res + get_categories_recursive($res, $child, $new_level, $with_depth);
            }
         }
      }

      return $res;
   }
}


if (!function_exists('get_terms')) {
   function get_terms($by = 'id', $val = '', $return = 'option', $limit = 1000)
   {
      if ($by == 'name') {
         $model = new \App\Models\Term();
         $query = $model->query()
            ->join('gmz_taxonomy', 'gmz_term.taxonomy_id', '=', 'gmz_taxonomy.id')
            ->select('gmz_term.*')
            ->where('gmz_taxonomy.taxonomy_name', $val)
            ->where('parent', 0)
            ->with('children')
            ->orderBy('id', 'DESC');
        
         $terms = $query->limit($limit)->get();
      } else {
         $terms = new \Illuminate\Database\Eloquent\Collection();
      }

      if ($return == 'full') {
         return $terms;
      } elseif ($return == 'option') {
         $choices = [];
         if (!$terms->isEmpty()) {
            foreach ($terms as $item) {
               $choices[$item->id] = $item->term_title;
            }
         }

         return $choices;
      } elseif ($return == 'id') {
         $choices = [];
         if (!$terms->isEmpty()) {
            foreach ($terms as $item) {
               array_push($choices, $item->id);
            }
         }

         return $choices;
      }

      return $terms;
   }
}

