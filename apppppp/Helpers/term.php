<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('get_terms_recursive')) {
   function get_terms_recursive($res = [], $terms, $level = 0, $with_depth = true)
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
               $res = $res + get_terms_recursive($res, $child, $new_level, $with_depth);
            }
         }
      }

      return $res;
   }
}

if (!function_exists('recursive_term_html')) {
   function recursive_term_html($params, $columns, $terms, $level = 0)
   {
      foreach ($terms as $key => $item) {
         if ($level > 0) {
            $depth_html = '';
            for ($i = 0; $i < $level; $i++) {
               $depth_html .= '---';
            }
            $depth_html .= '&nbsp;';
         } else {
            $depth_html = '';
         }
         echo view('Backend::screens.admin.term.item', ['item' => $item,
            'depth' => $depth_html,
            'params' => $params,
            'columns' => $columns
         ])->render();
         $relation = $item->getRelations();
          if(!empty($relation)) {
              $child = $relation['children'];
              if (!$child->isEmpty()) {
                  $new_level = $level + 1;
                  recursive_term_html($params, $columns, $child, $new_level);
              }
          }
      }
   }
}

if (!function_exists('get_term')) {
   function get_term($by = 'id', $key = '')
   {
      if ($by == 'id') {
         $terms = DB::table('gmz_term')
            ->where('id', $key)
            ->get()->first();
      } elseif ($by == 'name') {
         $terms = DB::table('gmz_term')
            ->where('term_name', $key)
            ->get()->first();
      } else {
         $terms = [];
      }

      return $terms;
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
         if (is_partner() && $val == 'beauty-branch') {
            $query->where('author', get_current_user_id());
         }
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

if (!function_exists('get_taxonomies')) {
   function get_taxonomies($by = 'id', $val = '', $return = 'option')
   {
      if ($by == 'name') {
         $taxonomies = DB::table('gmz_taxonomy')
            ->where('gmz_taxonomy.taxonomy_name', $val)
            ->get();
      } else {
         $taxonomies = [];
      }

      if ($return == 'full') {
         return $taxonomies;
      } elseif ($return == 'option') {
         $choices = [];
         if (!$taxonomies->isEmpty()) {
            foreach ($taxonomies as $item) {
               $choices[$item->id] = $item->term_title;
            }
         }

         return $choices;
      } elseif ($return == 'id') {
         $choices = [];
         if (!$taxonomies->isEmpty()) {
            foreach ($taxonomies as $item) {
               array_push($choices, $item->id);
            }
         }

         return $choices;
      }

      return $taxonomies;
   }
}