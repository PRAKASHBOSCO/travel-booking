<?php

namespace App\Plugins\PageBuilder\Elements;

class Space
{
   private $_id = 'gmz_element_space';
   private static $_inst;

   public static function inst()
   {
      if (empty(self::$_inst)) {
         self::$_inst = new self();
      }
      return self::$_inst;
   }

   public function __construct()
   {
   }

   public function getID()
   {
      return $this->_id;
   }

   public function getIcon()
   {
      return '<i class="fal fa-tags"></i>';
   }

   public function getName()
   {
      return __('Space');
   }

   public function enqueueEditorStyles()
   {

   }

   public function enqueueEditorScripts()
   {

   }

   public function getDescription()
   {
      return __('Display a space between elements');
   }

   public function getFields()
   {
      return [
         [
            'id' => 'space',
            'label' => __('Space'),
            'type' => 'number',
            'min_max_step' => [5,500,1],
            'std' => 30,
            'layout' => 'col-12',
         ],
      ];
   }

   public function getHTML($params)
   {
      return view('Theme.Goya::elements.' . $params['id'], ['params' => $params, 'data_settings' => true]);
   }
}
