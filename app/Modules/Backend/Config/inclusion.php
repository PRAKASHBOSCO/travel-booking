<?php
return [
	'inclusion' => [
		[
			'id' => 'content_settings',
			'label' => __('General'),
			'fields' => [
             
				[
					'id' => 'title',
					'label' => __('Title'),
					'type' => 'text',
					'std' => '',
                    'layout' => 'col-12 col-md-6',

					// 'break' => true,
                    'validation' => 'required',
					// 'translation' => true,
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
                 [
                    'id' => 'icon_img_upload',
                    'label' => __('Icon Image'),
                    'type' => 'image',
                    'layout' => 'col-12 col-md-6',
                ],
                
               
			]
		],

	]
];