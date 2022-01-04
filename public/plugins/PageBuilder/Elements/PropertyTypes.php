<?php
namespace App\Plugins\PageBuilder\Elements;

class PropertyTypes{
    private $_id = 'gmz_property_types';
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
        return __('Property Types');
    }

    public function enqueueEditorStyles(){
        return bd_enqueue_styles(['gmz-custom-accordions']);
    }

    public function enqueueEditorScripts(){
        return bd_enqueue_scripts([]);
    }

    public function getDescription(){
        return __('Show list of property types of Hotel');
    }

    public function getFields(){
        return [
            [
                'id' => 'title',
                'label' => __('Title'),
                'type' => 'text',
                'layout' => 'col-12 col-md-12',
                'break' => true,
	            'std' => 'List of Destinations',
                'translation' => true
            ],
	        [
		        'id' => 'description',
		        'label' => __('Description'),
		        'type' => 'textarea',
		        'layout' => 'col-12 col-md-12',
		        'break' => true,
		        'std' => 'Descriptions',
		        'translation' => true
	        ],
            [
                'id' => 'property_type',
                'label' => __('Property Types'),
                'type' => 'checkbox',
                'std' => 'all',
                'break' => true,
                'column' => 'col-12',
                'translation' => true,
                'choices' => 'term:name:property-type'
            ],
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
