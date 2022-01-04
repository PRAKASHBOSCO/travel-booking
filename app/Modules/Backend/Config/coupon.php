<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 12/9/20
 * Time: 10:10
 */
return [
    'fields' => [
        [
            'id' => 'code',
            'label' => __('Code'),
            'type' => 'text',
            'std' => '',
            'layout' => 'col-md-6 col-12',
            'validation' => 'required'
        ],
        [
            'id' => 'percent',
            'label' => __('Discount(%)'),
            'type' => 'text',
            'std' => '',
            'layout' => 'col-md-6 col-12',
            'validation' => 'required',
        ],
        [
            'id' => 'description',
            'label' => __('Description'),
            'type' => 'textarea',
            'rows' => '4',
            'std' => '',
            'layout' => 'col-12',
            'translation' => true,
        ],
        [
            'id' => 'start_date',
            'label' => __('Start Date'),
            'type' => 'date_picker',
            'std' => '',
            'layout' => 'col-md-6 col-12',
            'validation' => 'required',
        ],
        [
            'id' => 'end_date',
            'label' => __('End Date'),
            'type' => 'date_picker',
            'std' => '',
            'layout' => 'col-md-6 col-12',
            'validation' => 'required',
        ],
    ]
];