<?php
return [
	'countries' => [
		[
			'id' => 'content_settings',
			'label' => __('General'),
			'fields' => [
              
				[
					'id' => 'country_name',
					'label' => __('Country Name'),
					'type' => 'text',
					'std' => '',
                    'layout' => 'col-6 col-md-6',
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

               
			]
		],

	]
];