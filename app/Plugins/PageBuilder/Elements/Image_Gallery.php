<?php
namespace App\Plugins\PageBuilder\Elements;

class Image_Gallery{
    private $_id = 'gmz_image_group';
    private static $_inst;

    public function __construct(){

    }

    public function getID(){
        return $this->_id;
    }

    public function getIcon(){
        return '<i class="fal fa-tags"></i>';
    }

    public function getName(){
        return __('Image Group');
    }

    public function enqueueEditorStyles(){
        return bd_enqueue_styles([]);
    }

    public function enqueueEditorScripts(){
        return bd_enqueue_scripts([]);
    }

    public function getDescription(){
        return __('Image Group');
    }

    public function getFields(){
        return [
            [
                'id' => 'image',
                'label' => __('Image'),
                'type' => 'image',
                'layout' => 'col-12',
                'break' => true,
	            'std' => '',
            ],
	        [
		        'id' => 'gallery',
		        'label' => __('Gallery'),
		        'type' => 'gallery',
		        'layout' => 'col-12',
		        'break' => true,
		        'std' => ''
	        ]
        ];
    }

    public function getHTML($params){
        return view('Plugin.PageBuilder::elements.' . $params['id'], ['params' => $params, 'data_settings' => true]);
    }

    public static function inst(){
        if(empty(self::$_inst)){
            self::$_inst = new self();
        }
        return self::$_inst;
    }
}
