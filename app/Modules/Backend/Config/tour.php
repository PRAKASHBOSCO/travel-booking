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
                    'post_type' => GMZ_SERVICE_TOUR,
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
                    'choices' => 'status:tour',
                    'layout' => 'col-12 col-md-4',
                ],
                [
                    'id' => 'tour_type',
                    'label' => __('Type'),
                    'type' => 'select',
                    'std' => '',
                    'layout' => 'col-sm-4 col-12',
                    'choices' => 'term:name:tour-type',
                    'break' => true,
                ],
                [
                    'id' => 'duration',
                    'label' => __('Duration'),
                    'type' => 'text',
                    'layout' => 'col-sm-4 col-12',
                    'validation' => 'required',
                    'translation' => true,
                ],
                [
                    'id' => 'group_size',
                    'label' => __('Group Size'),
                    'type' => 'number',
                    'min_max_step' => [1, 100, 1],
                    'layout' => 'col-12 col-sm-4',
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
                    'id' => 'adult_price',
                    'label' => __('Adult Price'),
                    'type' => 'text',
                    'std' => '',
                    'validation' => 'required',
                    'layout' => 'col-lg-4 col-md-6 col-sm-6 col-12',
                ],
                [
                    'id' => 'children_price',
                    'label' => __('Children Price'),
                    'type' => 'text',
                    'std' => '',
                    'layout' => 'col-lg-4 col-md-6 col-sm-6 col-12',
                ],
                [
                    'id' => 'infant_price',
                    'label' => __('Infant Price'),
                    'type' => 'text',
                    'std' => '',
                    'layout' => 'col-lg-4 col-md-6 col-sm-6 col-12',
                ],
                [
                    'id' => 'booking_type',
                    'label' => __('Booking Type'),
                    'type' => 'select',
                    'std' => 'date',
                    'layout' => 'col-sm-4 col-12',
                    'choices' => [
                        'date' => __('Date'),
                        'external_link' => __('External Link')
                    ],
                    'break' => true,
                ],
                [
                    'id' => 'external_link',
                    'label' => __('External Link'),
                    'type' => 'text',
                    'break' => true,
                    'condition' => 'booking_type:external_link'
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
        'attributes' => [
            'id' => 'attributes_settings',
            'label' => __('Attributes'),
            'fields' => [
                [
                    'id' => 'tour_include',
                    'label' => __('Tour Includes'),
                    'type' => 'checkbox',
                    'std' => '',
                    'break' => true,
                    'column' => 'col-md-4 col-sm-6 col-12',
                    'translation' => true,
                    'choices' => 'term:name:tour-include'
                ],
                [
                    'id' => 'tour_exclude',
                    'label' => __('Tour Excludes'),
                    'type' => 'checkbox',
                    'std' => '',
                    'break' => true,
                    'column' => 'col-md-4 col-sm-6 col-12',
                    'translation' => true,
                    'choices' => 'term:name:tour-exclude'
                ],
                [
                    'id' => 'highlight',
                    'label' => __('HighLight'),
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
                    'id' => 'itinerary',
                    'label' => __('Itinerary'),
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