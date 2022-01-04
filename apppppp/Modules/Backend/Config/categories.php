<?php
return [
	'forum_category' => [
		[
			'id' => 'content_settings',
			'label' => __('General'),
			'fields' => [
                [
                    'id' => 'parent',
                    'label' => __('Parent Category'),
                    'type' => 'select',
                    'choices' =>'term:name:post-category:true',
                    'layout' => 'col-12 col-md-4',
                    'break' => true
                ],
				[
					'id' => 'category_name',
					'label' => __('Title'),
					'type' => 'text',
					'std' => '',
					'break' => true,
                    'validation' => 'required',
					'translation' => true,
				],
                [
                    'id' => 'category_slug',
                    'label' => __('Permalink'),
                    'type' => 'permalink',
                    'post_type' => 'forum_category',
                    'break' => true,
                ],
                [
                    'id' => 'category_status',
                    'label' => __('Status'),
                    'type' => 'select',
                    'choices' => [
                        'Publish' => __('Publish'),
                        'Draft' => __('Draft')
                    ],
                    'layout' => 'col-12 col-md-4',
                    'break' => true
                ],
               
			]
		],

	]
];