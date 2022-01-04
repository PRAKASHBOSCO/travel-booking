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
                    'id' => 'post_slug',
                    'label' => __('Permalink'),
                    'type' => 'permalink',
                    'post_type' => GMZ_SERVICE_SPACE,
                    'break' => true,
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
                    'id' => 'post_description',
                    'label' => __('Short Description'),
                    'type' => 'textarea',
                    'layout' => 'col-12',
                    'std' => '',
                    'break' => true,
                    'translation' => true
                ],
                [
                    'id' => 'is_featured',
                    'label' => __('Is Featured'),
                    'type' => 'switcher',
                    'std' => 'on',
                    'break' => true,
                ],
                [
                    'id' => 'status',
                    'label' => __('Status'),
                    'type' => 'select',
                    'choices' => 'status:space',
                    'layout' => 'col-12 col-md-4',
                ],
                [
                    'id' => 'space_type',
                    'label' => __('Type'),
                    'type' => 'select',
                    'std' => '',
                    'layout' => 'col-sm-4 col-12',
                    'choices' => 'term:name:space-type'
                ],
                [
                    'id' => 'booking_form',
                    'label' => __('Booking Form'),
                    'type' => 'select',
                    'std' => 'instant',
                    'layout' => 'col-sm-4 col-12',
                    'choices' => [
                        'instant' => __('Instant'),
                        'enquiry' => __('Enquiry'),
                        'both' => __('Instant & Enquiry')
                    ]
                ],
			]
		],
        'location' => [
            'id' => 'location_settings',
            'label' => __('Location'),
            'fields' => [
                [
                    'id' => 'location',
                    'label' => __('Location'),
                    'type' => 'location',
                    'std' => '',
                    'break' => true,
                    'translation_ext' => true,
                    'column' => 'col-lg-3',
                ]
            ]
        ],
        'pricing' => [
            'id' => 'pricing_settings',
            'label' => __('Pricing'),
            'fields' => [
                [
                    'id' => 'booking_type',
                    'label' => __('Booking Type'),
                    'type' => 'select',
                    'std' => 'per_day',
                    'layout' => 'col-lg-4 col-md-6 col-sm-6 col-12',
                    'choices' => [
                        'per_day' => __('Per Day'),
                        'per_hour' => __('Per Hour')
                    ]
                ],
                [
                    'id' => 'base_price',
                    'label' => __('Base Price'),
                    'type' => 'text',
                    'std' => '',
                    'break' => true,
                    'validation' => 'required',
                    'layout' => 'col-lg-4 col-md-6 col-sm-6 col-12',
                ],
                [
                    'id' => 'discount_by_day',
                    'label' => __('Discount By Number Of Day'),
                    'type' => 'list_item',
                    'layout' => 'col-md-8 col-12',
                    'break' => true,
                    'translation' => true,
                    'condition' => 'booking_type:per_day',
                    'fields' => [
                        [
                            'id' => 'title',
                            'label' => __('Title'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                            'translation' => true,
                        ],
                        [
                            'id' => 'from',
                            'label' => __('From'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                        ],
                        [
                            'id' => 'to',
                            'label' => __('To'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                        ],
                        [
                            'id' => 'price',
                            'label' => __('Price'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                        ]
                    ]
                ],
                [
                    'id' => 'extra_services',
                    'label' => __('Extra Services'),
                    'type' => 'list_item',
                    'layout' => 'col-md-8 col-12',
                    'break' => true,
                    'translation' => true,
                    'fields' => [
                        [
                            'id' => 'title',
                            'label' => __('Title'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                            'translation' => true,
                        ],
                        [
                            'id' => 'price',
                            'label' => __('Price'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                        ],
                        [
                            'id' => 'required',
                            'label' => __('Required'),
                            'type' => 'switcher',
                            'std' => 'off',
                            'break' => true,
                        ],
                    ]
                ],
                [
                    'id' => 'external_booking',
                    'label' => __('Enable External Booking'),
                    'type' => 'switcher',
                    'std' => 'off',
                    'break' => true,
                ],
                [
                    'id' => 'external_link',
                    'label' => __('External Link'),
                    'type' => 'text',
                    'break' => true,
                    'layout' => 'col-sm-6 col-12',
                    'condition' => 'external_booking:on'
                ],
            ]
        ],
        'custom_price' => [
            'id' => 'custom_price_settings',
            'label' => __('Custom Price'),
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
        'amemity' => [
            'id' => 'amemity_settings',
            'label' => __('Amenities'),
            'fields' => [
                [
                    'id' => 'number_of_guest',
                    'label' => __('Number of Guest'),
                    'type' => 'number',
                    'std' => '1',
                    'layout' => 'col-md-6 col-sm-6 col-12',
                    'min_max_step' => [1, 100, 1],
                ],
                [
                    'id' => 'number_of_bedroom',
                    'label' => __('Number of Bedrooms'),
                    'type' => 'number',
                    'std' => '1',
                    'layout' => 'col-md-6 col-sm-6 col-12',
                    'min_max_step' => [1, 100, 1],
                ],
                [
                    'id' => 'number_of_bathroom',
                    'label' => __('Number of Bathrooms'),
                    'type' => 'number',
                    'std' => '1',
                    'layout' => 'col-md-6 col-sm-6 col-12',
                    'min_max_step' => [1, 100, 1],
                ],
                [
                    'id' => 'size',
                    'label' => __('Size (m2/ft)'),
                    'type' => 'text',
                    'std' => '',
                    'layout' => 'col-md-6 col-sm-6 col-12',
                    'validation' => 'required',
                ],
                [
                    'id' => 'space_amenity',
                    'label' => __('Space Amenities'),
                    'type' => 'checkbox',
                    'std' => '',
                    'break' => true,
                    'column' => 'col-md-4 col-sm-6 col-12',
                    'translation' => true,
                    'choices' => 'term:name:space-amenity'
                ],
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
                [
                    'id' => 'video',
                    'label' => __('Video'),
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6',
                    'break' => true,
                ]
            ]
        ],
		'policy' => [
			'id' => 'policy_settings',
			'label' => __('Policies'),
			'fields' => [
                [
                    'id' => 'enable_cancellation',
                    'label' => __('Enable Cancellation'),
                    'type' => 'switcher',
                    'std' => 'off',
                    'break' => true,
                ],
                [
                    'id' => 'cancel_before',
                    'label' => __('Cancel Before (Days)'),
                    'type' => 'number',
                    'std' => '5',
                    'break' => true,
                    'min_max_step' => [1, 30, 1],
	                'condition' => 'enable_cancellation:on'
                ],
                [
                    'id' => 'cancellation_detail',
                    'label' => __('Cancellation Detail'),
                    'type' => 'textarea',
                    'break' => true,
                    'translation' => true,
                    'rows' => '5',
                    'condition' => 'enable_cancellation:on'
                ]
			]
		]
	]
];