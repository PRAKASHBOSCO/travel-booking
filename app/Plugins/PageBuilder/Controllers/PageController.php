<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 12/8/20
 * Time: 17:37
 */

namespace App\Plugins\PageBuilder\Controllers;

if ( ! defined( 'GMZPATH' ) ) { exit; }

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\Contracts\IPageService;
use Illuminate\Http\Request;

class PageController extends Controller {
	private $service;

	public function __construct(IPageService $service) {
		$this->service = $service;
	}

    public function singleView($slug){
        $data = $this->service->getPostBySlug($slug);
	    if($data){
            if(is_admin() || $data['author'] == get_current_user_id() || $data['status'] == 'publish') {
                global $post;
                $post = $data->getAttributes();
                $post['post_type'] = 'page';
                return view('Plugin.PageBuilder::page.single', ['post' => $post]);
            }
	    }
	    return response()->view('Frontend::errors.404', [], 200);
    }
}