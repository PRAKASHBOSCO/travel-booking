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
               'post_type' => GMZ_SERVICE_BEAUTY,
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
               'id' => 'base_price',
               'label' => __('Base Price'),
               'type' => 'text',
               'std' => '',
               'validation' => 'required',
               'layout' => 'col-md-4 col-sm-6 col-12',
            ],
            [
               'id' => 'status',
               'label' => __('Status'),
               'type' => 'select',
               'choices' => 'status:beauty',
               'layout' => 'col-md-4 col-sm-6 col-12',
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
         'id' => 'attribute_settings',
         'label' => __('Attribute'),
         'fields' => [
            [
               'id' => 'service',
               'label' => __('Select Category'),
               'type' => 'select',
               'std' => '',
               'layout' => 'col-md-6 col-sm-6 col-12',
               'choices' => 'term:name:beauty-services'
            ],
            [
               'id' => 'branch',
               'label' => __('Select Branch'),
               'type' => 'select_with_metadata_term',
               'std' => '',
               'layout' => 'col-md-6 col-sm-6 col-12',
               'choices' => 'term:name:beauty-branch'
            ],
            [
               'id' => 'available_space',
               'label' => __('Available space per service'),
               'type' => 'number',
               'std' => '3',
               'layout' => 'col-md-6 col-sm-6 col-12',
            ],
            [
               'id' => 'service_starts',
               'label' => __('Service Starts'),
               'type' => 'time_picker',
               'std' => '09:00',
               'layout' => 'col-md-6 col-sm-6 col-12'
            ],
            [
               'id' => 'service_ends',
               'label' => __('Service Ends'),
               'type' => 'time_picker',
               'std' => '18:00',
               'layout' => 'col-md-6 col-sm-6 col-12',
            ],
            [
               'id' => 'service_duration',
               'label' => __('Service Duration'),
               'type' => 'time_picker',
               'std' => '01:00',
               'layout' => 'col-md-6 col-sm-6 col-12',
            ],
            [
               'id' => 'agent',
               'label' => __('Select Agent'),
               'type' => 'multi-select2',
               'std' => '',
               'break' => true,
               'layout' => 'col-12',
               'choices' => 'agent'
            ],
            [
               'id' => 'day_off_week',
               'label' => __('Days off of the week'),
               'type' => 'multi-select2',
               'std' => '',
               'break' => true,
               'layout' => 'col-12',
               'choices' => 'day_off_week'
            ],
         ]
      ],
      [
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
      [
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
      [
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