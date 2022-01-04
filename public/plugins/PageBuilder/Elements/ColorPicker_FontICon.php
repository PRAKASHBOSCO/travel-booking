<?php
namespace App\Plugins\PageBuilder\Elements;

class ColorPicker_FontICon{
    private $_id = 'gmz_picker_group';
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
        return __('Picker Group');
    }

    public function enqueueEditorStyles(){
        return bd_enqueue_styles([]);
    }

    public function enqueueEditorScripts(){
        return bd_enqueue_scripts([]);
    }

    public function getDescription(){
        return __('Picker Group');
    }

    public function getFields(){
        return [
	        [
		        'id' => 'main_color',
		        'label' => __('Main Color'),
		        'type' => 'color_picker',
		        'std' => '#1ea69a',
		        'break' => true
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
