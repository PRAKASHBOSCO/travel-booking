<?php
return [
    'settings' => [
        'sections' => [
            [
                'id' => 'general_options',
                'label' => __('General'),
            ],
            [
                'id' => 'page_options',
                'label' => __('Pages'),
            ],
            [
                'id' => 'booking_options',
                'label' => __('Booking'),
            ],
            [
                'id' => 'service_options',
                'label' => __('Services')
            ],
            [
                'id' => 'review_options',
                'label' => __('Reviews')
            ],
            [
                'id' => 'appearance_options',
                'label' => __('Appearance')
            ],
            [
                'id' => 'email_options',
                'label' => __('Email')
            ],
            [
                'id' => 'invoice_options',
                'label' => __('Invoice')
            ],
            [
                'id' => 'advanced_options',
                'label' => __('Advanced')
            ]
        ],
        'fields' => [
            [
                'id' => 'general_tab',
                'label' => __('General'),
                'type' => 'tab',
                'layout' => 'col-12 col-md-6',
                'std' => '#e2a03f',
                'break' => true,
                'translation' => true,
                'section' => 'general_options',
                'tabs' => [
                    [
                        'id' => 'general',
                        'heading' => __('General'),
                        'fields' => [
                            [
                                'id' => 'site_name',
                                'label' => __('Site Name'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'iBooking',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'general'
                            ],
                            [
                                'id' => 'site_description',
                                'label' => __('Site Description'),
                                'type' => 'textarea',
                                'layout' => 'col-12 col-md-8',
                                'std' => '',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'general'
                            ],
                            [
                                'id' => 'admin_user',
                                'label' => __('Admin User'),
                                'type' => 'select',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'choices' => 'user:admin',
                                'tab' => 'general'
                            ],
                            [
                                'id' => 'logo',
                                'label' => __('Logo'),
                                'type' => 'image',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'general'
                            ],
                            [
                                'id' => 'favicon',
                                'label' => __('Favicon'),
                                'type' => 'image',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'general'
                            ],
                            [
                                'id' => 'logo-dashboard',
                                'label' => __('Logo dashboard'),
                                'type' => 'image',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'general'
                            ],
                        ]
                    ],
                    [
                        'id' => 'styling',
                        'heading' => __('Styling'),
                        'fields' => [
                            [
                                'id' => 'main_color',
                                'label' => __('Main Color'),
                                'type' => 'color_picker',
                                'layout' => 'col-12 col-md-8',
                                'std' => '#1ea69a',
                                'break' => true,
                                'tab' => 'styling'
                            ],
                            [
                                'id' => 'custom_css',
                                'label' => __('Custom CSS'),
                                'type' => 'css',
                                'layout' => 'col-12',
                                'std' => '',
                                'break' => true,
                                'tab' => 'styling'
                            ],
                        ]
                    ],
                    [
                        'id' => 'other',
                        'heading' => __('Other'),
                        'fields' => [
                            [
                                'id' => 'header_code',
                                'label' => __('Header Code'),
                                'type' => 'textarea',
                                'layout' => 'col-12',
                                'break' => true,
                                'description' => __('You can add custom code to head of page in here. Ex: Google Analytics code'),
                                'rows' => '10',
                                'tab' => 'other'
                            ],
                            [
                                'id' => 'footer_code',
                                'label' => __('Footer Code'),
                                'type' => 'textarea',
                                'layout' => 'col-12',
                                'break' => true,
                                'rows' => '10',
                                'description' => __('You can add custom code to foot of page in here.'),
                                'tab' => 'other'
                            ],
                        ]
                    ],
                ]
            ],
            //Page
            [
                'id' => 'page_tab',
                'label' => __('Pages'),
                'type' => 'tab',
                'layout' => 'col-12 col-md-8',
                'std' => '#e2a03f',
                'break' => true,
                'translation' => true,
                'tabs' => [
                    [
                        'id' => 'home_page',
                        'heading' => __('Home Page'),
                        'fields' => [
                            [
                                'id' => 'home_page_link',
                                'label' => '',
                                'type' => 'link',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'std' => url('/'),
                                'tab' => 'home_page'
                            ],
                            [
                                'id' => 'home_slider_text',
                                'label' => __('Text on slider'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'Enjoy a great ride with ibooking',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'home_page'
                            ],
                            [
                                'id' => 'home_slider',
                                'label' => __('Slider'),
                                'type' => 'gallery',
                                'layout' => 'col-12 col-md-12',
                                'break' => true,
                                'tab' => 'home_page'
                            ],
                            [
                                'id' => 'list_destination',
                                'type' => 'list_item',
                                'label' => __('List Destinations'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'image',
                                        'label' => __('Feature Image'),
                                        'type' => 'image',
                                        'layout' => 'col-12',
                                        'break' => true,
                                    ],
                                    [
                                        'id' => 'lat',
                                        'label' => __('Latitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ],
                                    [
                                        'id' => 'lng',
                                        'label' => __('Longitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ]
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'home_page'
                            ],
                            [
                                'id' => 'testimonials',
                                'type' => 'list_item',
                                'label' => __('Testimonial'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'content',
                                        'label' => __('Content'),
                                        'type' => 'textarea',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'home_page'
                            ],
                        ]
                    ],
                    [
                        'id' => 'blog_page',
                        'heading' => __('Blog'),
                        'fields' => [
                            [
                                'id' => 'blog_link',
                                'label' => '',
                                'type' => 'link',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'std' => url('blog'),
                                'tab' => 'blog_page'
                            ],
                            [
                                'id' => 'blog_feature_image',
                                'label' => __('Feature Image On Blog Page'),
                                'type' => 'image',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'blog_page'
                            ]
                        ]
                    ],
                    [
                        'id' => 'contact_page',
                        'heading' => __('Contact'),
                        'fields' => [
                            [
                                'id' => 'contact_link',
                                'label' => '',
                                'type' => 'link',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'std' => url('contact-us'),
                                'tab' => 'contact_page'
                            ],
                            [
                                'id' => 'contact_feature_image',
                                'label' => __('Feature Image On Contact Page'),
                                'type' => 'image',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'contact_page'
                            ],
                            [
                                'id' => 'contact_heading',
                                'label' => __('Heading'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'contact_page'
                            ],
                            [
                                'id' => 'contact_description',
                                'label' => __('Description'),
                                'type' => 'textarea',
                                'rows' => 4,
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'contact_page'
                            ],
                            [
                                'id' => 'contact_address',
                                'label' => __('Address'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'contact_page'
                            ],
                            [
                                'id' => 'contact_phone',
                                'label' => __('Phone'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'contact_page'
                            ],
                            [
                                'id' => 'contact_email',
                                'label' => __('Email'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'contact_page'
                            ],
                            [
                                'id' => 'contact_map_lat',
                                'label' => __('Latitude'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'contact_page'
                            ],
                            [
                                'id' => 'contact_map_lng',
                                'label' => __('Longitude'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'contact_page'
                            ],
                        ]
                    ]
                ],
                'section' => 'page_options',
            ],

            //Booking
            [
                'id' => 'currencies',
                'type' => 'list_item',
                'label' => __('Currencies'),
                'translation' => true,
                'binding' => 'name',
                'fields' => [
                    [
                        'id' => 'name',
                        'label' => __('Name'),
                        'type' => 'text',
                        'layout' => 'col-12 col-md-6',
                        'translation' => true
                    ],
                    [
                        'id' => 'symbol',
                        'label' => __('Symbol'),
                        'type' => 'text',
                        'layout' => 'col-12 col-md-6',
                        'break' => true,
                    ],
                    [
                        'id' => 'unit',
                        'label' => __('Unit'),
                        'type' => 'select',
                        'choices' => default_currencies(),
                        'style' => 'wide',
                        'layout' => 'col-12 col-sm-4',
                    ],
                    [
                        'id' => 'exchange',
                        'label' => __('Exchange Rate'),
                        'type' => 'text',
                        'std' => 1,
                        'layout' => 'col-12 col-sm-4',
                    ],
                    [
                        'id' => 'position',
                        'label' => __('Position'),
                        'type' => 'select',
                        'choices' => [
                            'left' => __('Left ($99)'),
                            'left_space' => __('Left With Space ($ 99)'),
                            'right' => __('Right (99$)'),
                            'right_space' => __('Right With Space (99 $)'),
                        ],
                        'style' => 'wide',
                        'std' => 'left',
                        'layout' => 'col-12 col-sm-4',
                        'break' => true,
                    ],
                    [
                        'id' => 'thousand_separator',
                        'label' => __('Thousand Separator'),
                        'type' => 'text',
                        'std' => ',',
                        'layout' => 'col-12 col-sm-4',
                    ],
                    [
                        'id' => 'decimal_separator',
                        'label' => __('Decimal Separator'),
                        'type' => 'text',
                        'std' => '.',
                        'layout' => 'col-12 col-sm-4',
                    ],
                    [
                        'id' => 'currency_decimal',
                        'label' => __('Currency Decimal'),
                        'type' => 'number',
                        'minlength' => 0,
                        'std' => 0,
                        'layout' => 'col-12 col-sm-4',
                    ],
                ],
                'std' => [
                    [
                        'name' => 'USD',
                        'symbol' => '$',
                        'unit' => 'USD',
                        'exchange' => 1,
                        'position' => 'left',
                        'thousand_separator' => ',',
                        'decimal_separator' => '.',
                        'currency_decimal' => 2
                    ]
                ],
                'layout' => 'col-12 col-md-10',
                'break' => true,
                'section' => 'booking_options'
            ],

            [
                'id' => 'primary_currency',
                'label' => __('Primary Currency'),
                'type' => 'select',
                'choices' => 'currency',
                'std' => 'USD',
                'layout' => 'col-12 col-md-8',
                'style' => 'wide',
                'break' => true,
                'section' => 'booking_options'
            ],
            [
                'id' => 'tax_included',
                'label' => __('Tax is included?'),
                'type' => 'switcher',
                'std' => 'off',
                'section' => 'booking_options'
            ],
            [
                'id' => 'tax_percent',
                'label' => __('Tax (%)'),
                'type' => 'text',
                'std' => '10',
                'layout' => 'col-12 col-md-8',
                'section' => 'booking_options',
            ],
            [
                'id' => 'commission',
                'label' => __('Commission (%)'),
                'type' => 'number',
                'layout' => 'col-12 col-md-8',
                'std' => '25',
                'min_max_step' => [1, 100, 1],
                'section' => 'booking_options',
            ],

            [
                'id' => 'payment_heading',
                'label' => __('Payment Gateways'),
                'type' => 'heading',
                'layout' => 'col-12 col-md-8',
                'std' => '',
                'section' => 'booking_options',
            ],

            [
                'id' => 'payment_tab',
                'label' => __('Payment Tab'),
                'type' => 'tab',
                'layout' => 'col-12 col-md-8',
                'std' => '#e2a03f',
                'break' => true,
                'translation' => true,
                'tabs' => 'payment_settings',
                'section' => 'booking_options',
            ],


            //Car Service
            [
                'id' => 'service_tab',
                'label' => __('Services'),
                'type' => 'tab',
                'layout' => 'col-12 col-md-8',
                'std' => '#e2a03f',
                'break' => true,
                'translation' => true,
                'tabs' => [
                    [
                        'id' => 'hotel_service',
                        'heading' => __('Hotel'),
                        'fields' => [
                            [
                                'id' => 'hotel_link',
                                'label' => '',
                                'type' => 'link',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'std' => url('hotel'),
                                'tab' => 'hotel_service'
                            ],
                            [
                                'id' => 'hotel_enable',
                                'label' => __('Enable'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'hotel_service',
                            ],
                            [
                                'id' => 'hotel_approve',
                                'label' => __('Need Approve to Publish'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'off',
                                'break' => true,
                                'tab' => 'hotel_service',
                                'condition' => 'hotel_enable:on'
                            ],
                            [
                                'id' => 'hotel_show_partner_info',
                                'label' => __('Display owner info in detail page'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'hotel_service',
                                'condition' => 'hotel_enable:on'
                            ],
                            [
                                'id' => 'hotel_search_radius',
                                'label' => __('Search Radius'),
                                'type' => 'number',
                                'description' => __('are calculated in kilometers from the searched location'),
                                'layout' => 'col-12 col-md-8',
                                'std' => '25',
                                'break' => true,
                                'min_max_step' => [1, 100, 1],
                                'tab' => 'hotel_service',
                                'condition' => 'hotel_enable:on'
                            ],
                            [
                                'id' => 'hotel_search_number',
                                'label' => __('Search Number Items'),
                                'type' => 'number',
                                'layout' => 'col-12 col-md-8',
                                'std' => '6',
                                'break' => true,
                                'min_max_step' => [1, 50],
                                'tab' => 'hotel_service',
                                'condition' => 'hotel_enable:on'
                            ],
                            [
                                'id' => 'hotel_slider_text',
                                'label' => __('Text on slider'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'Enjoy a great ride with ibooking',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'hotel_service',
                                'condition' => 'hotel_enable:on'
                            ],
                            [
                                'id' => 'hotel_slider',
                                'label' => __('Slider'),
                                'type' => 'gallery',
                                'layout' => 'col-12 col-md-12',
                                'break' => true,
                                'tab' => 'hotel_service',
                                'condition' => 'hotel_enable:on'
                            ],
                            [
                                'id' => 'hotel_list_destination',
                                'type' => 'list_item',
                                'label' => __('List Destinations'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'image',
                                        'label' => __('Feature Image'),
                                        'type' => 'image',
                                        'layout' => 'col-12',
                                        'break' => true,
                                    ],
                                    [
                                        'id' => 'lat',
                                        'label' => __('Latitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ],
                                    [
                                        'id' => 'lng',
                                        'label' => __('Longitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ]
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'hotel_service',
                                'condition' => 'hotel_enable:on'
                            ],
                            [
                                'id' => 'hotel_testimonials',
                                'type' => 'list_item',
                                'label' => __('Testimonial'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'content',
                                        'label' => __('Content'),
                                        'type' => 'textarea',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'hotel_service',
                                'condition' => 'hotel_enable:on'
                            ],
                        ]
                    ],
                    [
                        'id' => 'apartment_service',
                        'heading' => __('Apartment'),
                        'fields' => [
                            [
                                'id' => 'apartment_link',
                                'label' => '',
                                'type' => 'link',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'std' => url('apartment'),
                                'tab' => 'apartment_service'
                            ],
                            [
                                'id' => 'apartment_enable',
                                'label' => __('Enable'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'apartment_service',
                            ],
                            [
                                'id' => 'apartment_approve',
                                'label' => __('Need Approve to Publish'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'off',
                                'break' => true,
                                'tab' => 'apartment_service',
                                'condition' => 'apartment_enable:on'
                            ],
                            [
                                'id' => 'apartment_show_partner_info',
                                'label' => __('Display owner info in detail page'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'apartment_service',
                                'condition' => 'apartment_enable:on'
                            ],
                            [
                                'id' => 'apartment_search_radius',
                                'label' => __('Search Radius'),
                                'type' => 'number',
                                'description' => __('are calculated in kilometers from the searched location'),
                                'layout' => 'col-12 col-md-8',
                                'std' => '25',
                                'break' => true,
                                'min_max_step' => [1, 100, 1],
                                'tab' => 'apartment_service',
                                'condition' => 'apartment_enable:on'
                            ],
                            [
                                'id' => 'apartment_search_number',
                                'label' => __('Search Number Items'),
                                'type' => 'number',
                                'layout' => 'col-12 col-md-8',
                                'std' => '6',
                                'break' => true,
                                'min_max_step' => [1, 50],
                                'tab' => 'apartment_service',
                                'condition' => 'apartment_enable:on'
                            ],
                            [
                                'id' => 'apartment_slider_text',
                                'label' => __('Text on slider'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'Enjoy a great ride with ibooking',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'apartment_service',
                                'condition' => 'apartment_enable:on'
                            ],
                            [
                                'id' => 'apartment_slider',
                                'label' => __('Slider'),
                                'type' => 'gallery',
                                'layout' => 'col-12 col-md-12',
                                'break' => true,
                                'tab' => 'apartment_service',
                                'condition' => 'apartment_enable:on'
                            ],
                            [
                                'id' => 'apartment_list_destination',
                                'type' => 'list_item',
                                'label' => __('List Destinations'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'image',
                                        'label' => __('Feature Image'),
                                        'type' => 'image',
                                        'layout' => 'col-12',
                                        'break' => true,
                                    ],
                                    [
                                        'id' => 'lat',
                                        'label' => __('Latitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ],
                                    [
                                        'id' => 'lng',
                                        'label' => __('Longitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ]
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'apartment_service',
                                'condition' => 'apartment_enable:on'
                            ],
                            [
                                'id' => 'apartment_testimonials',
                                'type' => 'list_item',
                                'label' => __('Testimonial'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'content',
                                        'label' => __('Content'),
                                        'type' => 'textarea',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'apartment_service',
                                'condition' => 'apartment_enable:on'
                            ],
                        ]
                    ],
                    [
                        'id' => 'car_service',
                        'heading' => __('Car'),
                        'fields' => [
                            [
                                'id' => 'car_link',
                                'label' => '',
                                'type' => 'link',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'std' => url('car'),
                                'tab' => 'car_service'
                            ],
                            [
                                'id' => 'car_enable',
                                'label' => __('Enable'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'car_service',
                            ],
                            [
                                'id' => 'car_approve',
                                'label' => __('Need Approve to Publish'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'off',
                                'break' => true,
                                'condition' => 'car_enable:on',
                                'tab' => 'car_service',
                            ],
                            [
                                'id' => 'car_show_partner_info',
                                'label' => __('Display owner info in detail page'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'car_service',
                                'condition' => 'car_enable:on'
                            ],
                            [
                                'id' => 'car_search_radius',
                                'label' => __('Search Radius'),
                                'type' => 'number',
                                'layout' => 'col-12 col-md-8',
                                'std' => '25',
                                'break' => true,
                                'min_max_step' => [1, 100, 1],
                                'tab' => 'car_service',
                                'condition' => 'car_enable:on'
                            ],
                            [
                                'id' => 'car_search_number',
                                'label' => __('Search Number Items'),
                                'type' => 'number',
                                'layout' => 'col-12 col-md-8',
                                'std' => '6',
                                'break' => true,
                                'min_max_step' => [1, 50],
                                'tab' => 'car_service',
                                'condition' => 'car_enable:on'
                            ],
                            [
                                'id' => 'car_slider_text',
                                'label' => __('Text on slider'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'Enjoy a great ride with ibooking',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'car_service',
                                'condition' => 'car_enable:on'
                            ],
                            [
                                'id' => 'car_slider',
                                'label' => __('Slider'),
                                'type' => 'gallery',
                                'layout' => 'col-12 col-md-12',
                                'break' => true,
                                'tab' => 'car_service',
                                'condition' => 'car_enable:on'
                            ],
                            [
                                'id' => 'car_list_destination',
                                'type' => 'list_item',
                                'label' => __('List Destinations'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'image',
                                        'label' => __('Feature Image'),
                                        'type' => 'image',
                                        'layout' => 'col-12',
                                        'break' => true,
                                    ],
                                    [
                                        'id' => 'lat',
                                        'label' => __('Latitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ],
                                    [
                                        'id' => 'lng',
                                        'label' => __('Longitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ]
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'car_service',
                                'condition' => 'car_enable:on'
                            ],
                            [
                                'id' => 'car_testimonials',
                                'type' => 'list_item',
                                'label' => __('Testimonial'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'content',
                                        'label' => __('Content'),
                                        'type' => 'textarea',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'car_service',
                                'condition' => 'car_enable:on'
                            ],
                        ]
                    ],
                    [
                        'id' => 'space_service',
                        'heading' => __('Space'),
                        'fields' => [
                            [
                                'id' => 'space_link',
                                'label' => '',
                                'type' => 'link',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'std' => url('space'),
                                'tab' => 'space_service'
                            ],
                            [
                                'id' => 'space_enable',
                                'label' => __('Enable'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'space_service',
                            ],
                            [
                                'id' => 'space_approve',
                                'label' => __('Need Approve to Publish'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'off',
                                'break' => true,
                                'tab' => 'space_service',
                                'condition' => 'space_enable:on'
                            ],
                            [
                                'id' => 'space_show_partner_info',
                                'label' => __('Display owner info in detail page'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'space_service',
                                'condition' => 'space_enable:on'
                            ],
                            [
                                'id' => 'space_search_radius',
                                'label' => __('Search Radius'),
                                'type' => 'number',
                                'description' => __('are calculated in kilometers from the searched location'),
                                'layout' => 'col-12 col-md-8',
                                'std' => '25',
                                'break' => true,
                                'min_max_step' => [1, 100, 1],
                                'tab' => 'space_service',
                                'condition' => 'space_enable:on'
                            ],
                            [
                                'id' => 'space_search_number',
                                'label' => __('Search Number Items'),
                                'type' => 'number',
                                'layout' => 'col-12 col-md-8',
                                'std' => '6',
                                'break' => true,
                                'min_max_step' => [1, 50],
                                'tab' => 'space_service',
                                'condition' => 'space_enable:on'
                            ],
                            [
                                'id' => 'space_slider_text',
                                'label' => __('Text on slider'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'Enjoy a great ride with ibooking',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'space_service',
                                'condition' => 'space_enable:on'
                            ],
                            [
                                'id' => 'space_slider',
                                'label' => __('Slider'),
                                'type' => 'gallery',
                                'layout' => 'col-12 col-md-12',
                                'break' => true,
                                'tab' => 'space_service',
                                'condition' => 'space_enable:on'
                            ],
                            [
                                'id' => 'space_list_destination',
                                'type' => 'list_item',
                                'label' => __('List Destinations'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'image',
                                        'label' => __('Feature Image'),
                                        'type' => 'image',
                                        'layout' => 'col-12',
                                        'break' => true,
                                    ],
                                    [
                                        'id' => 'lat',
                                        'label' => __('Latitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ],
                                    [
                                        'id' => 'lng',
                                        'label' => __('Longitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ]
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'space_service',
                                'condition' => 'space_enable:on'
                            ],
                            [
                                'id' => 'space_testimonials',
                                'type' => 'list_item',
                                'label' => __('Testimonial'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'content',
                                        'label' => __('Content'),
                                        'type' => 'textarea',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'space_service',
                                'condition' => 'space_enable:on'
                            ],
                        ]
                    ],
                    [
                        'id' => 'tour_service',
                        'heading' => __('Tour'),
                        'fields' => [
                            [
                                'id' => 'tour_link',
                                'label' => '',
                                'type' => 'link',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'std' => url('tour'),
                                'tab' => 'tour_service'
                            ],
                            [
                                'id' => 'tour_enable',
                                'label' => __('Enable'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'tour_service',
                            ],
                            [
                                'id' => 'tour_approve',
                                'label' => __('Need Approve to Publish'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'off',
                                'break' => true,
                                'tab' => 'tour_service',
                                'condition' => 'tour_enable:on'
                            ],
                            [
                                'id' => 'tour_show_partner_info',
                                'label' => __('Display owner info in detail page'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'tour_service',
                                'condition' => 'tour_enable:on'
                            ],
                            [
                                'id' => 'tour_search_radius',
                                'label' => __('Search Radius'),
                                'type' => 'number',
                                'description' => __('are calculated in kilometers from the searched location'),
                                'layout' => 'col-12 col-md-8',
                                'std' => '25',
                                'break' => true,
                                'min_max_step' => [1, 100, 1],
                                'tab' => 'tour_service',
                                'condition' => 'tour_enable:on'
                            ],
                            [
                                'id' => 'tour_search_number',
                                'label' => __('Search Number Items'),
                                'type' => 'number',
                                'layout' => 'col-12 col-md-8',
                                'std' => '6',
                                'break' => true,
                                'min_max_step' => [1, 50],
                                'tab' => 'tour_service',
                                'condition' => 'tour_enable:on'
                            ],
                            [
                                'id' => 'tour_slider_text',
                                'label' => __('Text on slider'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'Enjoy a great ride with ibooking',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'tour_service',
                                'condition' => 'tour_enable:on'
                            ],
                            [
                                'id' => 'tour_slider',
                                'label' => __('Slider'),
                                'type' => 'gallery',
                                'layout' => 'col-12 col-md-12',
                                'break' => true,
                                'tab' => 'tour_service',
                                'condition' => 'tour_enable:on'
                            ],
                            [
                                'id' => 'tour_list_destination',
                                'type' => 'list_item',
                                'label' => __('List Destinations'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'image',
                                        'label' => __('Feature Image'),
                                        'type' => 'image',
                                        'layout' => 'col-12',
                                        'break' => true,
                                    ],
                                    [
                                        'id' => 'lat',
                                        'label' => __('Latitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ],
                                    [
                                        'id' => 'lng',
                                        'label' => __('Longitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ]
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'tour_service',
                                'condition' => 'tour_enable:on'
                            ],
                            [
                                'id' => 'tour_testimonials',
                                'type' => 'list_item',
                                'label' => __('Testimonial'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'content',
                                        'label' => __('Content'),
                                        'type' => 'textarea',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'tour_service',
                                'condition' => 'tour_enable:on'
                            ],
                        ]
                    ],
                    [
                        'id' => 'beauty_services',
                        'heading' => __('Beauty'),
                        'fields' => [
                            [
                                'id' => 'beauty_link',
                                'label' => '',
                                'type' => 'link',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'std' => url('beauty-services'),
                                'tab' => 'beauty_services'
                            ],
                            [
                                'id' => 'beauty_enable',
                                'label' => __('Enable'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'beauty_services',
                            ],
                            [
                                'id' => 'beauty_approve',
                                'label' => __('Need Approve to Publish'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'off',
                                'break' => true,
                                'tab' => 'beauty_services',
                                'condition' => 'beauty_enable:on'
                            ],
                            [
                                'id' => 'beauty_show_partner_info',
                                'label' => __('Display owner info in detail page'),
                                'type' => 'switcher',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'beauty_service',
                                'condition' => 'beauty_enable:on'
                            ],
                            [
                                'id' => 'beauty_search_radius',
                                'label' => __('Search Radius'),
                                'type' => 'number',
                                'description' => __('are calculated in kilometers from the searched location'),
                                'layout' => 'col-12 col-md-8',
                                'std' => '25',
                                'break' => true,
                                'min_max_step' => [1, 100, 1],
                                'tab' => 'beauty_services',
                                'condition' => 'beauty_enable:on'
                            ],
                            [
                                'id' => 'beauty_search_number',
                                'label' => __('Search Number Items'),
                                'type' => 'number',
                                'layout' => 'col-12 col-md-8',
                                'std' => '6',
                                'break' => true,
                                'min_max_step' => [1, 50],
                                'tab' => 'beauty_services',
                                'condition' => 'beauty_enable:on'
                            ],
                            [
                                'id' => 'beauty_slider_text',
                                'label' => __('Text on slider'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'std' => 'Enjoy a great ride with ibooking',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'beauty_services',
                                'condition' => 'beauty_enable:on'
                            ],
                            [
                                'id' => 'beauty_slider',
                                'label' => __('Slider'),
                                'type' => 'gallery',
                                'layout' => 'col-12 col-md-12',
                                'break' => true,
                                'tab' => 'beauty_services',
                                'condition' => 'beauty_enable:on'
                            ],
                            [
                                'id' => 'beauty_list_destination',
                                'type' => 'list_item',
                                'label' => __('List Destinations'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'image',
                                        'label' => __('Feature Image'),
                                        'type' => 'image',
                                        'layout' => 'col-12',
                                        'break' => true,
                                    ],
                                    [
                                        'id' => 'lat',
                                        'label' => __('Latitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ],
                                    [
                                        'id' => 'lng',
                                        'label' => __('Longitude'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                    ]
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'beauty_services',
                                'condition' => 'beauty_enable:on'
                            ],
                            [
                                'id' => 'beauty_testimonials',
                                'type' => 'list_item',
                                'label' => __('Testimonial'),
                                'translation' => true,
                                'binding' => 'name',
                                'fields' => [
                                    [
                                        'id' => 'name',
                                        'label' => __('Name'),
                                        'type' => 'text',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'content',
                                        'label' => __('Content'),
                                        'type' => 'textarea',
                                        'layout' => 'col-12',
                                        'translation' => true
                                    ],
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'beauty_services',
                                'condition' => 'beauty_enable:on'
                            ],
                        ]
                    ],
                ],
                'section' => 'service_options',
            ],

            //Review
            [
                'id' => 'enable_post_review',
                'label' => __('Enable Post Review'),
                'type' => 'switcher',
                'layout' => 'col-12 col-md-8',
                'std' => 'on',
                'section' => 'review_options'
            ],
            [
                'id' => 'enable_review',
                'label' => __('Enable Service Review'),
                'type' => 'switcher',
                'layout' => 'col-12 col-md-8',
                'std' => 'on',
                'section' => 'review_options'
            ],
            [
                'id' => 'need_booking_to_review',
                'label' => __('Need Booking To Review'),
                'type' => 'switcher',
                'layout' => 'col-12 col-md-8',
                'std' => 'off',
                'section' => 'review_options'
            ],
            [
                'id' => 'need_approve_review',
                'label' => __('Need Approve To Publish Review'),
                'type' => 'switcher',
                'layout' => 'col-12 col-md-8',
                'std' => 'off',
                'section' => 'review_options'
            ],
            //Appearance
            [
                'id' => 'appearance_tab',
                'label' => __('Appearance'),
                'type' => 'tab',
                'layout' => 'col-12 col-md-8',
                'std' => '#e2a03f',
                'break' => true,
                'translation' => true,
                'section' => 'appearance_options',
                'tabs' => [
                    [
                        'id' => 'footer',
                        'heading' => __('Footer'),
                        'fields' => [
                            //Footer
                            [
                                'id' => 'footer_menu_1_heading',
                                'label' => __('First Widget Heading'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'footer'
                            ],
                            [
                                'id' => 'footer_menu_1',
                                'label' => __('First Widget'),
                                'type' => 'select',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'choices' => 'menu',
                                'tab' => 'footer'
                            ],
                            [
                                'id' => 'footer_menu_2_heading',
                                'label' => __('Second Widget Heading'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'footer'
                            ],
                            [
                                'id' => 'footer_menu_2',
                                'label' => __('Second Widget'),
                                'type' => 'select',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'choices' => 'menu',
                                'tab' => 'footer'
                            ],
                            [
                                'id' => 'footer_menu_3_heading',
                                'label' => __('Third Widget Heading'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'footer'
                            ],
                            [
                                'id' => 'footer_menu_3',
                                'label' => __('Third Widget'),
                                'type' => 'select',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'choices' => 'menu',
                                'tab' => 'footer'
                            ],
                            [
                                'id' => 'footer_menu_4',
                                'label' => __('Footer Menu'),
                                'type' => 'select',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'choices' => 'menu',
                                'tab' => 'footer'
                            ],
                            [
                                'id' => 'footer_copyright',
                                'label' => __('Copyright'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'footer'
                            ],
                            [
                                'id' => 'social',
                                'type' => 'list_item',
                                'label' => __('Social'),
                                'translation' => true,
                                'binding' => 'title',
                                'fields' => [
                                    [
                                        'id' => 'title',
                                        'label' => __('Title'),
                                        'type' => 'text',
                                        'layout' => 'col-12 col-md-6',
                                        'translation' => true
                                    ],
                                    [
                                        'id' => 'icon',
                                        'label' => __('Icon'),
                                        'type' => 'icon_picker',
                                        'layout' => 'col-12 col-md-6',
                                        'break' => true,
                                    ],
                                    [
                                        'id' => 'url',
                                        'label' => __('Url'),
                                        'type' => 'text',
                                        'layout' => 'col-12 col-md-12',
                                        'break' => true,
                                    ],
                                ],
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'footer'
                            ],
                        ]
                    ],
                    [
                        'id' => 'top_bar',
                        'heading' => __('Top bar'),
                        'fields' => [
                            [
                                'id' => 'top_bar_display',
                                'label' => __('Display'),
                                'type' => 'switcher',
                                'std' => 'on',
                                'tab' => 'top_bar'
                            ],
                            [
                                'id' => 'top_bar_promo_text',
                                'label' => __('Promo Title'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'top_bar'
                            ],
                            [
                                'id' => 'top_bar_promo_code',
                                'label' => __('Coupon Code'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'top_bar'
                            ],
                            [
                                'id' => 'top_bar_button_text',
                                'label' => __('Button Text'),
                                'type' => 'text',
                                'std' => __('SEE NOW'),
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'top_bar'
                            ],
                            [
                                'id' => 'top_bar_button_url',
                                'label' => __('Button Url'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'tab' => 'top_bar'
                            ],
                        ],
                    ],
                    [
                        'id' => 'gdpr_cookies',
                        'heading' => __('GDPR Cookies'),
                        'fields' => [
                            [
                                'id' => 'gdpr_enable',
                                'label' => __('Enable GDPR Cookies'),
                                'type' => 'switcher',
                                'std' => 'off',
                                'tab' => 'gdpr_cookies'
                            ],
                            [
                                'id' => 'gdpr_hide_after_click',
                                'label' => __('Hide After Click'),
                                'type' => 'switcher',
                                'std' => 'on',
                                'tab' => 'gdpr_cookies'
                            ],
                            [
                                'id' => 'gdpr_position',
                                'label' => __('Position'),
                                'type' => 'select',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'std' => 'left',
                                'choices' => [
                                    'left' => __('Left'),
                                    'right' => __('Right'),
                                ],
                                'tab' => 'gdpr_cookies'
                            ],
                            [
                                'id' => 'gdpr_manage_text',
                                'label' => __('Manage Text'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'gdpr_cookies'
                            ],
                            [
                                'id' => 'gdpr_banner_heading',
                                'label' => __('Banner Heading'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'gdpr_cookies'
                            ],
                            [
                                'id' => 'gdpr_banner_description',
                                'label' => __('Banner Description'),
                                'type' => 'textarea',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'gdpr_cookies'
                            ],
                            [
                                'id' => 'gdpr_banner_link_text',
                                'label' => __('Banner Link Text'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'gdpr_cookies'
                            ],
                            [
                                'id' => 'gdpr_policy_page',
                                'label' => __('Policy Page'),
                                'type' => 'select',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'std' => 'left',
                                'choices' => 'page',
                                'tab' => 'gdpr_cookies'
                            ],
                            [
                                'id' => 'gdpr_button_accept_text',
                                'label' => __('Button Accept Text'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'gdpr_cookies'
                            ],
                            [
                                'id' => 'gdpr_button_reject_text',
                                'label' => __('Button Reject Text'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-8',
                                'break' => true,
                                'translation' => true,
                                'tab' => 'gdpr_cookies'
                            ],
                        ],
                    ],
                ],
            ],

            //Email
            [
                'id' => 'logo_email',
                'label' => __('Logo Email'),
                'type' => 'image',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'section' => 'email_options'
            ],
            [
                'id' => 'enable_queue_mail',
                'label' => __('Enable Queue Mail'),
                'type' => 'switcher',
                'std' => 'off',
                'break' => true,
                'section' => 'email_options'
            ],
            [
                'id' => 'email_heading',
                'label' => __('Config Email'),
                'type' => 'heading',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'section' => 'email_options'
            ],
            [
                'id' => 'email_host',
                'label' => __('Host'),
                'type' => 'text',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'section' => 'email_options'
            ],
            [
                'id' => 'email_username',
                'label' => __('Username'),
                'type' => 'text',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'section' => 'email_options'
            ],
            [
                'id' => 'email_password',
                'label' => __('Password'),
                'type' => 'text',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'section' => 'email_options'
            ],
            [
                'id' => 'email_port',
                'label' => __('Port'),
                'type' => 'text',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'section' => 'email_options'
            ],
            [
                'id' => 'email_encryption',
                'label' => __('Encryption'),
                'type' => 'text',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'section' => 'email_options'
            ],

            //Invoice
            [
                'id' => 'invoice_logo',
                'label' => __('Invoice Logo'),
                'type' => 'image',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'section' => 'invoice_options'
            ],
            [
                'id' => 'invoice_name',
                'label' => __('Company Name'),
                'type' => 'text',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'section' => 'invoice_options'
            ],
            [
                'id' => 'invoice_address',
                'label' => __('Address'),
                'type' => 'text',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'section' => 'invoice_options'
            ],

            //Advanced
            [
                'id' => 'page_term_conditional',
                'label' => __('Terms and Conditions Page'),
                'type' => 'select',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'choices' => 'page',
                'section' => 'advanced_options'
            ],
            [
                'id' => 'site_language',
                'label' => __('Site Language'),
                'type' => 'select',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'choices' => 'language',
                'section' => 'advanced_options'
            ],
            [
                'id' => 'multi_language',
                'label' => __('Multi Language'),
                'type' => 'switcher',
                'std' => 'off',
                'break' => true,
                'section' => 'advanced_options'
            ],
            [
                'id' => 'is_rtl',
                'label' => __('Is RTL Layout'),
                'type' => 'switcher',
                'std' => 'off',
                'break' => true,
                'section' => 'advanced_options'
            ],
            [
                'id' => 'date_format',
                'label' => __('Date Format'),
                'type' => 'text',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'std' => 'd/m/Y',
                'section' => 'advanced_options'
            ],
            [
                'id' => 'time_format',
                'label' => __('Time Format'),
                'type' => 'text',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'std' => 'h:i A',
                'section' => 'advanced_options'
            ],
            [
                'id' => 'time_type',
                'label' => __('Time Type'),
                'type' => 'select',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'choices' => [
                    '12' => __('12h'),
                    '24' => __('24h'),
                ],
                'section' => 'advanced_options'
            ],
            [
                'id' => 'unit_of_measure',
                'label' => __('Unit Of Measure'),
                'type' => 'select',
                'layout' => 'col-12 col-md-8',
                'break' => true,
                'std' => 'm2',
                'choices' => [
                    'm2' => __('m2'),
                    'ft2' => __('ft2'),
                ],
                'section' => 'advanced_options'
            ],

            [
                'id' => 'mapbox_token',
                'label' => __('Mapbox Token'),
                'type' => 'textarea',
                'layout' => 'col-12',
                'break' => true,
                'section' => 'advanced_options'
            ],

            //Social Network
            [
                'id' => 'social_heading',
                'label' => __('Social Login'),
                'type' => 'heading',
                'layout' => 'col-12 col-md-8',
                'std' => '',
                'section' => 'advanced_options',
            ],
            [
                'id' => 'social_tab',
                'label' => __('Social Network'),
                'type' => 'tab',
                'layout' => 'col-12 col-md-8',
                'std' => '#e2a03f',
                'break' => true,
                'translation' => true,
                'tabs' => [
                    [
                        'id' => 'facebook_login',
                        'heading' => __('Facebook Login'),
                        'fields' => [
                            [
                                'id' => 'facebook_login_enable',
                                'label' => __('Enable'),
                                'type' => 'switcher',
                                'layout' => 'col-12',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'facebook_login'
                            ],
                            [
                                'id' => 'facebook_login_client_id',
                                'label' => __('App ID'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-6',
                                'condition' => 'facebook_login_enable:on',
                                'tab' => 'facebook_login',
                            ],
                            [
                                'id' => 'facebook_login_client_secret',
                                'label' => __('App Secret'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-6',
                                'break' => true,
                                'condition' => 'facebook_login_enable:on',
                                'tab' => 'facebook_login'
                            ],
                            [
                                'id' => 'facebook_login_redirect_url',
                                'label' => __('Callback Url'),
                                'type' => 'text',
                                'layout' => 'col-12',
                                'break' => true,
                                'condition' => 'facebook_login_enable:on',
                                'tab' => 'facebook_login'
                            ]
                        ]
                    ],
                    [
                        'id' => 'google_login',
                        'heading' => __('Google Login'),
                        'fields' => [
                            [
                                'id' => 'google_login_enable',
                                'label' => __('Enable'),
                                'type' => 'switcher',
                                'layout' => 'col-12',
                                'std' => 'on',
                                'break' => true,
                                'tab' => 'google_login'
                            ],
                            [
                                'id' => 'google_login_client_id',
                                'label' => __('Client ID'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-6',
                                'condition' => 'google_login_enable:on',
                                'tab' => 'google_login',
                            ],
                            [
                                'id' => 'google_login_client_secret',
                                'label' => __('Client Secret'),
                                'type' => 'text',
                                'layout' => 'col-12 col-md-6',
                                'break' => true,
                                'condition' => 'google_login_enable:on',
                                'tab' => 'google_login'
                            ],
                            [
                                'id' => 'google_login_redirect_url',
                                'label' => __('Redirect Url'),
                                'type' => 'text',
                                'layout' => 'col-12',
                                'break' => true,
                                'condition' => 'google_login_enable:on',
                                'tab' => 'google_login'
                            ]
                        ]
                    ]
                ],
                'section' => 'advanced_options',
            ],
        ]
    ]
];