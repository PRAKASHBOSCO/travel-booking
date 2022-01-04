<?php
return [
	'settings' => [
		'general' => [
			'id' => 'general_settings',
			'label' => __('General'),
			'fields' => [
				[
					'id' => 'post_title',
					'label' => __('Title'),
					'type' => 'text',
					'std' => '',
					'break' => true,
                    'validation' => 'required',
					'translation' => true,
				],
				[
					'id' => 'post_content',
					'label' => __('Content'),
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
                    'choices' => 'status:room',
                    'layout' => 'col-12 col-md-6',
                ],
			]
		],
        'attribute' => [
            'id' => 'attribute_settings',
            'label' => __('Attribute'),
            'fields' => [
                [
                    'id' => 'base_price',
                    'label' => __('Price'),
                    'type' => 'text',
                    'std' => '',
                    'validation' => 'required',
                    'layout' => 'col-12 col-md-4',
                ],
                [
                    'id' => 'room_footage',
                    'label' => __('Room Footage'),
                    'type' => 'text',
                    'std' => '',
                    'validation' => 'required',
                    'layout' => 'col-12 col-md-4',
                ],
                [
                    'id' => 'number_of_room',
                    'label' => __('Number Of Room'),
                    'type' => 'number',
                    'std' => '1',
                    'validation' => 'required',
                    'layout' => 'col-12 col-md-4',
                    'min_max_step' => [1, 100, 1],
                ],
                [
                    'id' => 'number_of_bed',
                    'label' => __('Number Of Bed'),
                    'type' => 'number',
                    'std' => '1',
                    'validation' => 'required',
                    'layout' => 'col-12 col-md-4',
                    'min_max_step' => [1, 100, 1],
                ],
                [
                    'id' => 'number_of_adult',
                    'label' => __('Number Of Adult'),
                    'type' => 'number',
                    'std' => '1',
                    'validation' => 'required',
                    'layout' => 'col-12 col-md-4',
                    'min_max_step' => [1, 100, 1],
                ],
                [
                    'id' => 'number_of_children',
                    'label' => __('Number Of Children'),
                    'type' => 'number',
                    'std' => '1',
                    'layout' => 'col-12 col-md-4',
                    'min_max_step' => [0, 100, 1],
                ],
                [
                    'id' => 'room_facilities',
                    'label' => __('Room Facilities'),
                    'type' => 'checkbox',
                    'std' => '',
                    'break' => true,
                    'column' => 'col-md-4 col-sm-6 col-12',
                    'translation' => true,
                    'choices' => 'term:name:room-facilities'
                ]
            ]
        ],
        'media' => [
            'id' => 'media_settings',
            'label' => __('Media'),
            'fields' => [
                [
                    'id' => 'thumbnail_id',
                    'label' => __('Featured Image'),
                    'type' => 'image',
                    'layout' => 'col-6',
                    'break' => true,
                ],
                [
                    'id' => 'gallery',
                    'label' => __('Gallery'),
                    'type' => 'gallery',
                    'layout' => 'col-12',
                    'break' => true,
                ],
            ]
        ],
        'custom_price' => [
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