<?php
return [
    'services' => [
        'post' => [
            'id' => 'post',
            'check_enable' => false,
        ],
        'page' => [
            'id' => 'page',
            'check_enable' => false,
        ],
        'hotel' => [
            'id' => 'hotel',
            'check_enable' => true,
        ],
        'apartment' => [
            'id' => 'apartment',
            'check_enable' => true,
        ],
        'car' => [
            'id' => 'car',
            'check_enable' => true,
        ],
        'space' => [
            'id' => 'space',
            'check_enable' => true,
        ],
        'tour' => [
            'id' => 'tour',
            'check_enable' => true,
        ],
        'beauty' => [
            'id' => 'beauty',
            'check_enable' => true,
        ]
    ],
    'posts_per_page' => 500,
    'page' => [
        'items' => [
            'home' => [
                'id' => 'home',
                'label' => __('Home Page'),
                'route' => '/'
            ],
            'hotel' => [
                'id' => 'hotel',
                'label' => __('Hotel Page'),
                'route' => 'hotel'
            ],
            'apartment' => [
                'id' => 'apartment',
                'label' => __('Apartment Page'),
                'route' => 'apartment'
            ],
            'car' => [
                'id' => 'car',
                'label' => __('Car Page'),
                'route' => 'car'
            ],
            'space' => [
                'id' => 'space',
                'label' => __('Space Page'),
                'route' => 'space'
            ],
            'beauty-services' => [
                'id' => 'beauty',
                'label' => __('Beauty Page'),
                'route' => 'beauty-services'
            ],
            'tour' => [
                'id' => 'tour',
                'label' => __('Tour Page'),
                'route' => 'tour'
            ],
            'hotel-search' => [
                'id' => 'hotel_search',
                'label' => __('Hotel Search Page'),
                'route' => 'hotel-search'
            ],
            'apartment-search' => [
                'id' => 'apartment_search',
                'label' => __('Apartment Search Page'),
                'route' => 'apartment-search'
            ],
            'car-search' => [
                'id' => 'car_search',
                'label' => __('Car Search Page'),
                'route' => 'car-search'
            ],
            'space-search' => [
                'id' => 'space_search',
                'label' => __('Space Search Page'),
                'route' => 'space-search'
            ],
            'beauty-search' => [
                'id' => 'beauty_search',
                'label' => __('Beauty Search Page'),
                'route' => 'beauty-search'
            ],
            'tour-search' => [
                'id' => 'tour_search',
                'label' => __('Tour Search Page'),
                'route' => 'tour-search'
            ],
            'blog' => [
                'id' => 'blog',
                'label' => __('Blog Page'),
                'route' => 'blog'
            ],
            'become-a-partner' => [
                'id' => 'become_partner',
                'label' => __('Become a Partner Page'),
                'route' => 'become-a-partner'
            ],
            'contact-us' => [
                'id' => 'contact_page',
                'label' => __('Contact Us Page'),
                'route' => 'contact-us'
            ],
        ],
        'fields' => [
            'general' => [
                [
                    'id' => 'seo_title',
                    'label' => __('SEO Title'),
                    'type' => 'text',
                    'std' => '',
                    'break' => true,
                    'translation' => true,
                ],
                [
                    'id' => 'meta_description',
                    'label' => __('Meta Description'),
                    'type' => 'textarea',
                    'rows' => 5,
                    'break' => true,
                    'translation' => true,
                ]
            ],
            'facebook' => [
                [
                    'id' => 'seo_image_facebook',
                    'label' => __('Facebook Image'),
                    'type' => 'image',
                    'break' => true,
                    'breakpoints' => 'xs sm'
                ],
                [
                    'id' => 'seo_title_facebook',
                    'label' => __('Facebook Title'),
                    'type' => 'text',
                    'std' => '',
                    'break' => true,
                    'translation' => true,
                ],
                [
                    'id' => 'meta_description_facebook',
                    'label' => __('Facebook Description'),
                    'type' => 'textarea',
                    'rows' => 5,
                    'break' => true,
                    'translation' => true,
                ]
            ],
            'twitter' => [
                [
                    'id' => 'seo_image_twitter',
                    'label' => __('Twitter Image'),
                    'type' => 'image',
                    'break' => true,
                    'breakpoints' => 'xs sm'
                ],
                [
                    'id' => 'seo_title_twitter',
                    'label' => __('Twitter Title'),
                    'type' => 'text',
                    'std' => '',
                    'break' => true,
                    'translation' => true,
                ],
                [
                    'id' => 'meta_description_twitter',
                    'label' => __('Twitter Description'),
                    'type' => 'textarea',
                    'rows' => 5,
                    'break' => true,
                    'translation' => true,
                ]
            ]
        ]
    ],
    'content' => [
        'items' => [
            'category' => [
                'id' => 'category',
                'label' => __('Categories'),
                'route' => 'category'
            ],
            'tag' => [
                'id' => 'tag',
                'label' => __('Tag'),
                'route' => 'tag'
            ],
            'post-single' => [
                'id' => 'single_post',
                'label' => __('Single Post'),
                'route' => 'post-single'
            ],
            'page-single' => [
                'id' => 'single_page',
                'label' => __('Single Page'),
                'route' => 'page-single'
            ],
            'hotel-single' => [
                'id' => 'single_hotel',
                'label' => __('Single Hotel'),
                'route' => 'hotel-single'
            ],
            'apartment-single' => [
                'id' => 'single_apartment',
                'label' => __('Single Apartment'),
                'route' => 'apartment-single'
            ],
            'car-single' => [
                'id' => 'single_car',
                'label' => __('Single Car'),
                'route' => 'car-single'
            ],
            'space-single' => [
                'id' => 'single_space',
                'label' => __('Single Space'),
                'route' => 'space-single'
            ],
            'tour-single' => [
                'id' => 'single_tour',
                'label' => __('Single Tour'),
                'route' => 'tour-single'
            ],
            'beauty-single' => [
                'id' => 'single_beauty',
                'label' => __('Single Beauty'),
                'route' => 'beauty-single'
            ]
        ],
        'fields' => [
            'general' => [
                [
                    'id' => 'seo_title',
                    'label' => __('SEO Title'),
                    'type' => 'text',
                    'std' => '',
                    'break' => true,
                    'translation' => true,
                ],
                [
                    'id' => 'meta_description',
                    'label' => __('Meta Description'),
                    'type' => 'textarea',
                    'rows' => 5,
                    'break' => true,
                    'translation' => true,
                ]
            ],
            'facebook' => [
                [
                    'id' => 'seo_image_facebook',
                    'label' => __('Facebook Image'),
                    'type' => 'image',
                    'break' => true,
                    'breakpoints' => 'xs sm'
                ],
                [
                    'id' => 'seo_title_facebook',
                    'label' => __('Facebook Title'),
                    'type' => 'text',
                    'std' => '',
                    'break' => true,
                    'translation' => true,
                ],
                [
                    'id' => 'meta_description_facebook',
                    'label' => __('Facebook Description'),
                    'type' => 'textarea',
                    'rows' => 5,
                    'break' => true,
                    'translation' => true,
                ]
            ],
            'twitter' => [
                [
                    'id' => 'seo_image_twitter',
                    'label' => __('Twitter Image'),
                    'type' => 'image',
                    'break' => true,
                    'breakpoints' => 'xs sm'
                ],
                [
                    'id' => 'seo_title_twitter',
                    'label' => __('Twitter Title'),
                    'type' => 'text',
                    'std' => '',
                    'break' => true,
                    'translation' => true,
                ],
                [
                    'id' => 'meta_description_twitter',
                    'label' => __('Twitter Description'),
                    'type' => 'textarea',
                    'rows' => 5,
                    'break' => true,
                    'translation' => true,
                ]
            ]
        ]
    ]
];