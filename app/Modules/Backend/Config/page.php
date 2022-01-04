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
                    'post_type' => 'page',
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
        ]
    ]
];