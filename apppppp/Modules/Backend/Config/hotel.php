<?php
return [
	'settings' => [
		[
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
                    'post_type' => GMZ_SERVICE_HOTEL,
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
                    'choices' => 'status:hotel',
                    'layout' => 'col-12 col-md-4',
                ],
                [
                    'id' => 'hotel_star',
                    'label' => __('Hotel Star'),
                    'type' => 'select',
                    'std' => '',
                    'layout' => 'col-sm-4 col-12',
                    'choices' => [
                        '5' => __('5 Star'),
                        '4' => __('4 Star'),
                        '3' => __('3 Star'),
                        '2' => __('2 Star'),
                        '1' => __('1 Star'),
                    ]
                ],
                [
                    'id' => 'property_type',
                    'label' => __('Property Type'),
                    'type' => 'select',
                    'std' => '',
                    'layout' => 'col-sm-4 col-12',
                    'choices' => 'term:name:property-type'
                ],
                [
                    'id' => 'booking_form',
                    'label' => __('Booking Form'),
                    'type' => 'select',
                    'std' => 'both',
                    'layout' => 'col-sm-4 col-12',
                    'choices' => [
                        'instant' => __('Instant'),
                        'enquiry' => __('Enquiry'),
                        'both' => __('Instant & Enquiry')
                    ]
                ],
			]
		],
        [
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
                ],
                [
                    'id' => 'nearby_common',
                    'label' => __('What\'s Nearby'),
                    'type' => 'list_item',
                    'layout' => 'col-md-6 col-12',
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
                            'id' => 'distance',
                            'label' => __('Distance'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                        ]
                    ]
                ],
                [
                    'id' => 'nearby_education',
                    'label' => __('Education'),
                    'type' => 'list_item',
                    'layout' => 'col-md-6 col-12',
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
                            'id' => 'distance',
                            'label' => __('Distance'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                        ]
                    ]
                ],
                [
                    'id' => 'nearby_health',
                    'label' => __('Health'),
                    'type' => 'list_item',
                    'layout' => 'col-md-6 col-12',
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
                            'id' => 'distance',
                            'label' => __('Distance'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                        ]
                    ]
                ],
                [
                    'id' => 'nearby_top_attractions',
                    'label' => __('Top Attractions'),
                    'type' => 'list_item',
                    'layout' => 'col-md-6 col-12',
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
                            'id' => 'distance',
                            'label' => __('Distance'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                        ]
                    ]
                ],
                [
                    'id' => 'nearby_restaurants_cafes',
                    'label' => __('Restaurants & Cafes'),
                    'type' => 'list_item',
                    'layout' => 'col-md-6 col-12',
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
                            'id' => 'distance',
                            'label' => __('Distance'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                        ]
                    ]
                ],
                [
                    'id' => 'nearby_natural_beauty',
                    'label' => __('Natural Beauty'),
                    'type' => 'list_item',
                    'layout' => 'col-md-6 col-12',
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
                            'id' => 'distance',
                            'label' => __('Distance'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                        ]
                    ]
                ],
                [
                    'id' => 'nearby_airports',
                    'label' => __('Closest Airports'),
                    'type' => 'list_item',
                    'layout' => 'col-md-6 col-12',
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
                            'id' => 'distance',
                            'label' => __('Distance'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                        ]
                    ]
                ]
            ]
        ],
        [
            'id' => 'pricing_settings',
            'label' => __('Pricing'),
            'fields' => [
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
                        ]
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
        [
            'id' => 'amemity_settings',
            'label' => __('Amenities'),
            'fields' => [
                [
                    'id' => 'checkin_time',
                    'label' => __('Checkin Time'),
                    'type' => 'text',
                    'std' => '',
                    'layout' => 'col-md-6 col-sm-6 col-12'
                ],
                [
                    'id' => 'checkout_time',
                    'label' => __('Checkout Time'),
                    'type' => 'text',
                    'std' => '',
                    'layout' => 'col-md-6 col-sm-6 col-12'
                ],
                [
                    'id' => 'min_day_booking',
                    'label' => __('Min Day Before Booking'),
                    'type' => 'number',
                    'std' => '1',
                    'layout' => 'col-md-6 col-sm-6 col-12',
                    'min_max_step' => [0, 100, 1],
                ],
                [
                    'id' => 'min_day_stay',
                    'label' => __('Min Day Stays'),
                    'type' => 'number',
                    'std' => '1',
                    'layout' => 'col-md-6 col-sm-6 col-12',
                    'min_max_step' => [1, 100, 1],
                ],
                [
                    'id' => 'hotel_facilities',
                    'label' => __('Hotel Facilities'),
                    'type' => 'checkbox',
                    'std' => '',
                    'break' => true,
                    'column' => 'col-md-4 col-sm-6 col-12',
                    'translation' => true,
                    'choices' => 'term:name:hotel-facilities'
                ],
                [
                    'id' => 'hotel_services',
                    'label' => __('Hotel Services'),
                    'type' => 'checkbox',
                    'std' => '',
                    'break' => true,
                    'column' => 'col-md-4 col-sm-6 col-12',
                    'translation' => true,
                    'choices' => 'term:name:hotel-services'
                ],
                [
                    'id' => 'faq',
                    'label' => __('FAQs'),
                    'type' => 'list_item',
                    'layout' => 'col-md-8 col-12',
                    'break' => true,
                    'translation' => true,
                    'binding' => 'question',
                    'fields' => [
                        [
                            'id' => 'question',
                            'label' => __('Question'),
                            'type' => 'text',
                            'std' => '',
                            'break' => true,
                            'translation' => true,
                        ],
                        [
                            'id' => 'answer',
                            'label' => __('Answer'),
                            'type' => 'textarea',
                            'std' => '',
                            'break' => true,
                            'translation' => true,
                        ]
                    ]
                ],
            ]
        ],
        [
            'id' => 'media_settings',
            'label' => __('Media'),
            'fields' => [
                [
                    'id' => 'hotel_logo',
                    'label' => __('Hotel Logo'),
                    'type' => 'image',
                    'layout' => 'col-6',
                    'break' => true,
                ],
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
		[
			'id' => 'policy_settings',
			'label' => __('Policies'),
			'fields' => [
                [
                    'id' => 'policy',
                    'label' => __('Policies'),
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
                            'id' => 'content',
                            'label' => __('Content'),
                            'type' => 'textarea',
                            'std' => '',
                            'break' => true,
                            'translation' => true,
                        ]
                    ]
                ],
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