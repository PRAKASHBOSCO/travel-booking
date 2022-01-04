<?php
return [
	'testimonials' => [
		[
			'id' => 'content_settings',
			'label' => __('General'),
			'fields' => [
              [
                    'id' => 'parent',
                    'label' => __('Package'),
                    'type' => 'select',
                    'choices' =>'term:name:post-category:true',
                    'layout' => 'col-6 col-md-6',
                    'break' => true
                ],
				[
					'id' => 'name',
					'label' => __('Name'),
					'type' => 'text',
					'std' => '',
                    'layout' => 'col-6 col-md-6',
					// 'break' => true,
                    'validation' => 'required',
					// 'translation' => true,
				],

                [
                    'id' => 'designation',
                    'label' => __('Designation'),
                    'type' => 'text',
                    'std' => '',
                    'layout' => 'col-12 col-md-6',

                    // 'break' => true,
                    'validation' => 'required',
                    // 'translation' => true,
                ],
                [
                    'id' => 'description',
                    'label' => __('Description'),
                    'type' => 'text',
                    'std' => '',
                    'layout' => 'col-12 col-md-6',

                    // 'break' => true,
                    'validation' => 'required',
                    // 'translation' => true,
                ],
                
                [
                    'id' => 'profile_img',
                    'label' => __('Profile  Image'),
                    'type' => 'image',
                    'layout' => 'col-12 col-md-6',
                ],
                [
                    'id' => 'testimonials_slug',
                    'label' => __('Permalink'),
                    'type' => 'permalink',
                    'post_type' => 'testimonials',
                    'break' => true,
                ],
                [
                    'id' => 'status',
                    'label' => __('Status'),
                    'type' => 'select',
                    'choices' => [
                        'Publish' => __('Publish'),
                        'Draft' => __('Draft')
                    ],
                    'layout' => 'col-12 col-md-6',
                    'break' => true
                ],

               
			]
		],

	]
];