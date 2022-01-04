<?php
namespace App\Plugins\PageBuilder\Elements;

class ListOfDestinations{
    private $_id = 'gmz_list_of_destinations';
    private static $_inst;

    public function __construct(){

    }

    public function getID(){
        return $this->_id;
    }

    public function getIcon(){
        return '<i class="fal fa-map-marked"></i>';
    }

    public function getName(){
        return __('List Of Destinations');
    }

    public function getDescription(){
        return __('Show list of destination with count of service');
    }

	public function enqueueEditorStyles(){
		return bd_enqueue_styles([]);
	}

	public function enqueueEditorScripts(){
		return bd_enqueue_scripts([]);
	}

    public function getFields(){
        return [
            [
                'id' => 'hotel_facilities',
                'label' => __('Hotel Facilities'),
                'type' => 'checkbox',
                'std' => '',
                'break' => true,
                'column' => 'col-12',
                'translation' => true,
                'choices' => 'term:name:property-type'
            ],
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
	            'std' => 'Content for demo',
                'translation' => true
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
