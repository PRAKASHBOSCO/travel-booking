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

class BuilderController extends Controller {
	private $service;

	public function __construct(IPageService $service) {
		$this->service = $service;
	}

	public function getBuilderRowSettingsAction(Request $request){
        $editor = view('Plugin.PageBuilder::editor-row')->render();

        return response()->json([
            'status' => true,
            'editor' => $editor
        ]);
    }

	public function getBuilderSaveAction(Request $request){
        $id = $request->post('page_id');
        $settings = $request->post('settings', '');
        if(!empty($id) && !empty($settings)){
            $model = new Page();
            $query = $model->query();
            $query->where('id', $id)->update([
                'post_content' => '[gmz_page_builder]' . serialize($settings)
            ]);

            $this->sendJson([
                'status' => 1,
                'title' => __('System Alert'),
                'message' => __('Page Saved!')
            ], true);
        }

        $this->sendJson([
            'status' => 0,
            'title' => __('System Alert'),
            'message' => __('Data is invalid')
        ], true);
    }

	public function getBuilderRenderPreviewAction(Request $request){
		$className = $request->post('class', '');
		if(!empty($className)){
			$params = [];
			$data = [];
			$data['id'] = $request->post('id');
			$data['class'] = $request->post('class');
			$data['time'] = $request->post('time');

			$params['id'] = $request->post('id');
			$params['class'] = $data['class'];
			$params['time'] = $data['time'];
			$fields = $data['class']::inst()->getFields();
			if (!empty($fields)){
				$langs = get_languages();
				foreach ($fields as $key => $item){
					$std = isset($item['std']) ? $item['std'] : '';
					if($item['type'] == 'list_item'){
						$value = request()->get($item['id'], '');
						$return  = [];
						if(count($langs) > 0) {
							$field_need_trans = [];
							foreach($item['fields'] as $fkey => $fval){
								if(isset($fval['translation']) && $fval['translation']){
									array_push($field_need_trans, $fval['id']);
								}
							}

							if ( ! empty( $value ) ) {
								foreach ( $value as $keyo => $valo ) {
									if ( ! empty( $valo ) ) {
										foreach ( $valo as $key1 => $val1 ) {
											if(in_array($keyo, $field_need_trans)){
												$str = '';
												foreach($val1 as $key2 => $val2){
													$str .= '[:' . $langs[$key2] . ']' . $val2;
												}
												$str .= '[:]';
												$return[$keyo][$key1][0] = $str;
											}else{
												$return[$keyo][$key1] = $val1;
											}
										}
									}
								}
							}
						}

						if(empty($return)){
							$return = $value;
						}

						$list_item_data = [];

						if(is_array($return) && !empty($return)) {
							foreach ($return as $keyi => $vali) {
								foreach ($vali as $child_key => $child_val) {
									$list_item_data[$child_key][$keyi] = $child_val[0];
								}
							}
						}

						$params[$item['id']] = $list_item_data;

					}elseif($item['type'] != 'checkbox') {
                        if (isset($item['translation']) && $item['translation']) {
                            $params[$item['id']] = set_translate($item['id']);
                        } else {
                            $params[$item['id']] = $request->post($item['id'], $std);
                        }
                    }else{
                        $params[$item['id']] = $request->post($item['id'], $std);
                    }
				}
			}

			$this->sendJson([
				'status' => 1,
				'element' => '#' . $data['id'] . '_' . $data['time'],
				'html' => view('Plugin.PageBuilder::preview', ['data' => $data, 'params' => $params, 'only_inner' => 1])->render(),
				'css' => $data['class']::inst()->enqueueEditorStyles(),
				'js' => $data['class']::inst()->enqueueEditorScripts()
			], true);
		}

		$this->sendJson([
			'status' => 0,
			'title' => __('System Alert'),
			'message' => __('Data is invalid')
		], true);
	}

	public function getBuilderEditBlockAction(Request $request){
		$params = $request->post('params');
		if(!empty($params)){
			$settings = $request->post('settings');
			$params = json_decode(base64_decode($params), true);
			$className = $params['class'];
			if(!empty($settings)){
				$settings = json_decode($settings, true);
			}

			if(!empty($className)){
				$data = $params['field'];
				$data['time'] = $settings['time'];
				$data['class'] = $className;
				if(!empty($data)){
					$fields = $className::inst()->getFields();
					$data['fields'] = $fields;
					$data['block_name'] = $className::inst()->getName();
					$editor = view('Plugin.PageBuilder::editor', ['data' => $data, 'settings' => $settings])->render();

					$arr_css = [];
					$arr_js = [];
					if(!empty($fields)){
						foreach ($fields as $fs){
							$field_configs = admin_config($fs['type'], 'builder');
							if($field_configs){
								if(!empty($field_configs['css'])) {
									$arr_css = array_unique(array_merge( $arr_css, $field_configs['css'] ));
								}
								if(!empty($field_configs['js'])) {
									$arr_js = array_unique(array_merge( $arr_js, $field_configs['js'] ));
								}
							}
						}
					}

					$css = bd_enqueue_styles($arr_css);
					$js = bd_enqueue_scripts($arr_js);

					return response()->json([
						'status' => true,
						'editor' => $editor,
                        'css' => $css,
                        'js' => $js
					]);
				}
			}

			return response()->json([
				'status' => true,
				'editor' => '',
				'preview' => ''
			]);
		}
	}

	public function getBuilderSelectBlockAction(Request $request){
		$params = $request->post('params');
		if(!empty($params)){
			$params = json_decode(base64_decode($params), true);
			$className = $params['class'];

			if(!empty($className)){
				$data = $params['field'];
				$data['time'] = time();
				$data['class'] = $className;
				if(!empty($data)){
					$fields = $className::inst()->getFields();
					$data['fields'] = $fields;
					$data['block_name'] = $className::inst()->getName();
					$editor = view('Plugin.PageBuilder::editor', ['data' => $data])->render();
					if(isset($data['description'])){
						unset($data['description']);
					}
					$preview = view('Plugin.PageBuilder::preview', ['data' => $data])->render();

					$arr_css = [];
					$arr_js = [];
					if(!empty($fields)){
						foreach ($fields as $fs){
							$field_configs = admin_config($fs['type'], 'builder');
							if($field_configs){
								if(!empty($field_configs['css'])) {
									$arr_css = array_unique(array_merge( $arr_css, $field_configs['css'] ));
								}
								if(!empty($field_configs['js'])) {
									$arr_js = array_unique(array_merge( $arr_js, $field_configs['js'] ));
								}
							}
						}
					}

					$css = bd_enqueue_styles($arr_css);
					$js = bd_enqueue_scripts($arr_js);

					return response()->json([
						'status' => true,
						'editor' => $editor,
						'preview' => $preview,
						'css' => $css,
						'js' => $js
					]);
				}
			}

			return response()->json([
				'status' => true,
				'editor' => '',
				'preview' => ''
			]);
		}
	}

	public function getBuilderBlocksAction(){
        $files = glob_recursive(app_path('Plugins/PageBuilder/Elements/*'));
        $blocks = [];
        if(!empty($files)){
            foreach ($files as $item){
                $files = explode('.', basename($item));
                $className = '\\App\\Plugins\\PageBuilder\\Elements\\' . $files[0];
                $classObject = $className::inst();
                $blocks[] = [
                    'class_name' => $className,
                    'id' => $classObject->getID(),
                    'icon' => $classObject->getIcon(),
                    'name' => $classObject->getName(),
                    'description' => $classObject->getDescription(),
                ];
            }
        }

        $theme = 'goya';
        $files_theme = glob_recursive(app_path('Themes/'. ucfirst($theme) .'/Elements/*'));
        if(!empty($files_theme)){
            foreach ($files_theme as $item){
                $files = explode('.', basename($item));
                $className = '\\App\\Themes\\'. ucfirst($theme) .'\\Elements\\' . $files[0];
                $classObject = $className::inst();
                $blocks[] = [
                    'class_name' => $className,
                    'id' => $classObject->getID(),
                    'icon' => $classObject->getIcon(),
                    'name' => $classObject->getName(),
                    'description' => $classObject->getDescription(),
                ];
            }
        }

        return response()->json([
            'status' => true,
            'blocks' => view('Plugin.PageBuilder::blocks', ['blocks' => $blocks])->render()
        ]);
    }

	public function getBuilderPage(Request $request){
		$page_id = $request->get('id', '');

		if($page_id) {
			$page_object = $this->service->getPostById($page_id);
			if($page_object) {
				$post_content = $page_object['post_content'];
				$post_content = str_replace('[gmz_page_builder]', '', $post_content);
				$post_content = json_decode(maybe_unserialize($post_content), true);
				return view( 'Plugin.PageBuilder::index', ['data' => $post_content]);
			}
		}
		return response()->view('Frontend::errors.404', [], 200);
    }
}