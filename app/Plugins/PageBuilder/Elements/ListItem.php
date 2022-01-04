<?php
namespace App\Plugins\PageBuilder\Elements;

class ListItem{
    private $_id = 'gmz_search_form6';
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
        return __('Search Form');
    }

    public function enqueueEditorStyles(){
        return bd_enqueue_styles(['slick', 'gmz-custom-accordions']);
    }

    public function enqueueEditorScripts(){
        return bd_enqueue_scripts(['slick']);
    }

    public function getDescription(){
        return __('Display search form on home page');
    }

    public function getFields(){
        return [
            [
                'id' => 'heading',
                'label' => __('Heading'),
                'type' => 'text',
                'layout' => 'col-12',
                'break' => true,
	            'std' => 'Enjoy a great ride with ibooking',
                'translation' => true
            ],
	        [
		        'id' => 'gallery',
		        'label' => __('Gallery'),
		        'type' => 'gallery',
		        'layout' => 'col-12',
		        'break' => true,
		        'std' => ''
	        ],
	        [
		        'id' => 'services',
		        'type' => 'list_item',
		        'label' => __('Services'),
		        'translation' => true,
		        'description' => __('Settings service tab in the search form'),
		        'binding' => 'name',
		        'fields' => [
			        [
				        'id' => 'name',
				        'label' => __('Name'),
				        'type' => 'text',
				        'layout' => 'col-12',
				        'translation' => true
			        ],
			        [
				        'id' => 'icon',
				        'label' => __('Icon'),
				        'type' => 'icon_picker',
				        'layout' => 'col-12',
				        'break' => true,
			        ],
			        [
				        'id' => 'service',
				        'label' => __('Service'),
				        'type' => 'select',
				        'choices' => get_services_enabled(true),
				        'layout' => 'col-12',
			        ]
		        ],
		        'layout' => 'col-12',
		        'break' => true
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
