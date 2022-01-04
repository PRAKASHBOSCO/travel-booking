<?php
return [
	'settings' => [
		[
			'id' => 'content_settings',
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
                    'post_type' => 'post',
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
                    'id' => 'status',
                    'label' => __('Status'),
                    'type' => 'select',
                    'choices' => [
                        'publish' => __('Publish'),
                        'draft' => __('Draft')
                    ],
                    'layout' => 'col-12 col-md-4',
                    'break' => true
                ],
                [
                    'id' => 'thumbnail_id',
                    'label' => __('Featured Image'),
                    'type' => 'image',
                    'layout' => 'col-12 col-md-6',
                ],
			]
		],
		[
			'id' => 'attribute_settings',
			'label' => __('Attributes'),
			'fields' => [
                [
                    'id' => 'post_category',
                    'label' => __('Categories'),
                    'type' => 'checkbox',
                    'std' => '',
                    'break' => true,
                    'column' => 'col-md-3 col-sm-6 col-12',
                    'translation' => true,
                    'choices' => 'term:name:post-category'
                ],
                [
                    'id' => 'post_tag',
                    'label' => __('Tags'),
                    'type' => 'text',
                    'std' => '',
                    'break' => true,
                ]
			]
		]
	]
];