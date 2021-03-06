<?php

namespace App\Services;

use App\Repositories\Contracts\ICategoriesRepository;
use App\Repositories\Contracts\ISeoRepository;
use App\Services\Contracts\ICategoriesService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesService extends AbstractService implements ICategoriesService{

	protected $repository;
    private $seoRepo;

    public function __construct(ICategoriesRepository $repository, ISeoRepository $seoRepo)
    {
        $this->repository = $repository;
        $this->seoRepo = $seoRepo;
    }

	 public function getCategoriesPagination($number = 10, $where = []){
        return $this->repository->paginate($number, $where);
    }



    public function getPostById($id){
        // dd($id);
        $data = $this->repository->find($id);
        if($data) {
            if (is_seo_enable()) {
                $seo = $this->seoRepo->where([
                    'id' => $data->id,
                    'category_type' => 'Forum'
                ], true);
                if ($seo) {
                    $data['seo'] = $seo->toArray();
                } else {
                    $data['seo'] = [];
                }
            }
        }
        return $data;
    }

    public function deleteCategoryTemp($type)
    {
        return $this->repository->deleteByWhere([
            'category_type' => $type,
            'created_by' => get_current_user_id(),
            'category_status' => 'Temp'
        ]);
    }

    public function storeNewCategory($type)
    {
        $dt=date('Y-m-d H:i:s');

         return $this->repository->save([
           'category_name' => 'New Category ' . time(),
            'category_slug' => Str::slug('New Category ' . time()),
            'category_type' => $type,
            'created_by' => get_current_user_id(),
            'updated_by' =>get_current_user_id(),
            'updated_at'=>$dt,
            'created_at'=>$dt,
            'parent'=>'0',
            'category_status' => 'Temp'
        ]);
        
    }

    public function deleteTestimonials($request){
        $params = $request->post('params', '');
        if(empty($params)){
            return [
                'status'  => 0,
                'message' => __( 'Data is invalid' )
            ];
        }

        $params = json_decode(base64_decode($params), true);
        $post_id = isset($params['postID']) ? $params['postID'] : '';
        $post_hashing = isset($params['postHashing']) ? $params['postHashing'] : 'none';

        if(!gmz_compare_hashing($post_id, $post_hashing)){
            return [
                'status'  => 0,
                'message' => __( 'Data is invalid' )
            ];
        }

        $this->seoRepo->deleteByWhere([
            'post_id' => $post_id,
            'post_type' => 'page'
        ]);

        $this->repository->delete($post_id);

        return [
            'status'  => 1,
            'message' => __( 'Delete successfully' ),
            'reload' => true
        ];
    }


    private function mergeData($post_data, $current_options){
        if(!empty($current_options)){
            $exclude_translate = ['checkbox'];
            foreach ($current_options as $item){
                if (isset($item['translation']) && $item['translation'] && !in_array($item['type'], $exclude_translate)) {
                    $post_data[$item['id']] = set_translate($item['id']);
                } else {
                    $post_data[$item['id']] = request()->get($item['id'], '');
                }
                if(!isset($post_data[$item['id']])){
                    $post_data[$item['id']] = '';
                }
            }
        }
        return $post_data;
    }


    public function createSlug($data)
    {
        $text_slug = $data['category_name'];

        if(strpos($text_slug, '[:]')){
            $text_slug_arr = explode('[:', $text_slug);
            $text_slug = '[:' . $text_slug_arr[1] . '[:';
            $start = strpos($text_slug, ']');
            $end = strpos($text_slug, '[');
            $text_slug = substr($text_slug, ($start + 1), ($end - $start + 2));
        }

        if(!empty($data['category_slug'])){
            $isNewSlug = strpos($data['category_slug'], 'new-category-');
            if($isNewSlug === false){
                $text_slug = $data['category_slug'];
            }
        }

        $slug = Str::slug($text_slug);

        $allSlugs = $this->repository->getRelatedSlugs($slug, $data['post_id']);

        if (! $allSlugs->contains('post_slug', $slug)){
            return $slug;
        }

        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('post_slug', $newSlug)) {
                return $newSlug;
            }
        }

        return $slug . '-' . time();
    }

    public function savePost($request){
        // dd($request);
        $post_id = $request->post('post_id', '');
        // dd($post_id);
        if(!empty($post_id)){
            $current_options = $request->post('current_options', '');
            $current_options = json_decode(base64_decode($current_options), true);

            $post_data = $this->mergeData($request->all(), $current_options);

            if(isset($post_data['post_title'])){
                $post_data['post_slug'] = $this->createSlug($post_data);
            }

           

           $updated = $this->repository->update($post_id, $post_data);

            if($updated){
                $response = [
                    'status' => 1,
                    'title' => __('System Alert'),
                    'message' => __('Saving data successfully')
                ];

                $finish = $request->post('finish', '');
                // dd($finish);
                if($finish) {
                    $response['redirect'] = dashboard_url('all-forum-categories' /*. $post_id */);
                }

                return $response;
            }
        }

        return [
            'status' => 0,
            'title' => __('System Alert'),
            'message' => __('Saving data failed')
        ];
    }
}