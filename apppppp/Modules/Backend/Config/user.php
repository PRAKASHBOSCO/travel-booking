<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 12/9/20
 * Time: 10:10
 */
return [
    'new-form-fields' => [
        [
            'id' => 'first_name',
            'label' => __('First Name'),
            'type' => 'text',
            'std' => '',
            'layout' => 'col-md-6 col-12',
            'validation' => 'required',
        ],
        [
            'id' => 'last_name',
            'label' => __('Last Name'),
            'type' => 'text',
            'std' => '',
            'layout' => 'col-md-6 col-12',
        ],
        [
            'id' => 'email',
            'label' => __('Email'),
            'type' => 'text',
            'std' => '',
            'layout' => 'col-12',
            'validation' => 'required',
            'break' => true,
        ],
        [
            'id' => 'role',
            'label' => __('Role'),
            'type' => 'select',
            'std' => 3,
            'layout' => 'col-12',
            'choices' => get_user_roles(true)
        ],
        [
            'id' => 'password',
            'label' => __('Password'),
            'type' => 'text',
            'std' => '',
            'layout' => 'col-12',
            'break' => true,
        ],
        [
            'id' => 'address',
            'label' => __('Address'),
            'type' => 'textarea',
            'std' => '',
            'layout' => 'col-12',
            'break' => true,
        ],
    ]
];