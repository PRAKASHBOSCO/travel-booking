<?php
return [
   'settings' => [
      [
         'id' => 'general_settings',
         'label' => __('General'),
         'fields' => [
            [
               'id' => 'post_title',
               'label' => __('Name'),
               'type' => 'text',
               'std' => '',
               'break' => true,
               'validation' => 'required',
               'translation' => true,
            ],
            [
               'id' => 'post_content',
               'label' => __('Description'),
               'type' => 'editor',
               'layout' => 'col-12',
               'std' => '',
               'break' => true,
               'translation' => true
            ],
            [
               'id' => 'status',
               'label' => __('Status'),
               'type' => 'select',
               'choices' => 'status:beauty',
               'layout' => 'col-12 col-md-4',
            ]
         ]
      ],
      [
         'id' => 'media_settings',
         'label' => __('Media'),
         'fields' => [
            [
               'id' => 'thumbnail_id',
               'label' => __('Avatar'),
               'type' => 'image',
               'layout' => 'col-6',
               'break' => true,
            ],
         ]
      ],
      [
         'id' => 'custom_price_settings',
         'label' => __('Availability'),
         'fields' => [
            [
               'id' => 'custom_price',
               'label' => __('Custom Pricing'),
               'type' => 'custom_price',
               'std' => '',
               'break' => true,
               'column' => 'col-12',
            ]
         ]
      ],
   ]
];