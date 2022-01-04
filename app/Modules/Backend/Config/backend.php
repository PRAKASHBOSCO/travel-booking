<?php
return [
    'prefix' => 'dashboard',
    'key_hashing' => '20190301',
    'post_types' => [
        'post' => [
            'singular' => __('Post'),
            'plural' => __('Posts'),
            'slug' => 'post'
        ],
        'page' => [
            'singular' => __('Page'),
            'plural' => __('Pages'),
            'slug' => 'page'
        ],
        'forum_category' => [
            'singular' => __('Category'),
            'plural' => __('Categories'),
            'slug' => 'brew_club/categories'
        ],
            'testimonials' => [
            'singular' => __('testimonials'),
            'plural' => __('testimonials'),
            'slug' => 'testimonials/testimonials'
        ],

        'inclusion' => [
            'singular' => __('inclusions'),
            'plural' => __('inclusions'),
            'slug' => 'inclusions/inclusions'
        ],

        'car' => [
            'singular' => __('Car'),
            'plural' => __('Cars'),
            'slug' => 'car'
        ],
        'apartment' => [
            'singular' => __('Apartment'),
            'plural' => __('Apartments'),
            'slug' => 'apartment'
        ],
        'tour' => [
            'singular' => __('Tour'),
            'plural' => __('Tours'),
            'slug' => 'tour'
        ],

          'Packages' => [
            'singular' => __('Package'),
            'plural' => __('Packages'),
            'slug' => 'package'
        ],

        'hotel' => [
            'singular' => __('Hotel'),
            'plural' => __('Hotels'),
            'slug' => 'hotel'
        ],
        'space' => [
            'singular' => __('Space'),
            'plural' => __('Space'),
            'slug' => 'space'
        ],
        'beauty' => [
            'singular' => __('Beauty Services'),
            'plural' => __('Beauty'),
            'slug' => 'beauty'
        ],
        'agent' => [
            'singular' => __('Agent'),
            'plural' => __('Agent'),
            'slug' => 'agent'
        ]
    ],
    'max_file_size' => 2,
    'menu_location' => [
        'primary' => __('Primary')
    ],
    'post_status' => [
        'publish' => __('Publish'),
        'draft' => __('Draft')
    ],
    'page_status' => [
        'publish' => __('Publish'),
        'draft' => __('Draft')
    ],
    'apartment_status' => [
        'publish' => __('Publish'),
        'draft' => __('Draft'),
        'pending' => __('Pending'),
    ],
    'tour_status' => [
        'publish' => __('Publish'),
        'draft' => __('Draft'),
        'pending' => __('Pending'),
    ],
    'car_status' => [
        'publish' => __('Publish'),
        'draft' => __('Draft'),
        'pending' => __('Pending'),
    ],
    'hotel_status' => [
        'publish' => __('Publish'),
        'draft' => __('Draft'),
        'pending' => __('Pending'),
    ],
    'room_status' => [
        'publish' => __('Publish'),
        'draft' => __('Draft'),
        'pending' => __('Pending'),
    ],
    'space_status' => [
        'publish' => __('Publish'),
        'draft' => __('Draft'),
        'pending' => __('Pending'),
    ],
    'agent_status' => [
        'publish' => __('Publish'),
        'draft' => __('Draft'),
        'pending' => __('Pending'),
    ],
    'beauty_status' => [
        'publish' => __('Publish'),
        'draft' => __('Draft'),
        'pending' => __('Pending'),
    ],
    'admin_menu' => [
        'heading_general' => [
            'type' => 'heading',
            'label' => __('General')
        ],
        'dashboard' => [
            'type' => 'item',
            'label' => 'Dashboard',
            'icon' => 'fa-tachometer-alt',
            'screen' => 'dashboard',
        ],
        'your_profile' => [
            'type' => 'item',
            'label' => __('Your Profile'),
            'icon' => 'fa-user-circle',
            'screen' => 'profile',
        ],
        'notification' => [
            'type' => 'item',
            'label' => __('Notifications'),
            'icon' => 'fa-bell',
            'screen' => 'notifications',
        ],
        'my_order' => [
            'type' => 'item',
            'label' => __('My Orders'),
            'icon' => 'fa-ballot-check',
            'screen' => 'my-orders',
        ],
        'wishlist' => [
            'type' => 'item',
            'label' => __('Wishlist'),
            'icon' => 'fa-heart',
            'screen' => 'wishlist',
        ],
        'earning_report' => [
            'type' => 'parent',
            'label' => __('Earnings Report'),
            'icon' => 'fa-file-chart-line',
            'id' => 'report',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __("Partner's Earnings "),
                    'icon' => 'icon_system_communication',
                    'screen' => 'partner-earnings',
                ],
                [
                    'type' => 'item',
                    'label' => __('Analytics'),
                    'icon' => 'icon_system_communication',
                    'screen' => 'analytics',
                ],
                [
                    'type' => 'item',
                    'label' => __('Withdrawal'),
                    'icon' => 'icon_system_communication',
                    'screen' => 'withdrawal',
                ]
            ],
            'screen' => ['partner-earnings', 'analytics', 'withdrawal'],
        ],
        /*post*/
        'post' => [
            'type' => 'parent',
            'label' => __('Post'),
            'icon' => 'fa-sticky-note',
            'id' => 'post',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Posts'),
                    'screen' => 'all-posts',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add new'),
                    'screen' => 'new-post',
                ],
                [
                    'type' => 'item',
                    'label' => __('Category'),
                    'screen' => 'term/post-category',
                ],
                [
                    'type' => 'item',
                    'label' => __('Tag'),
                    'screen' => 'term/post-tag',
                ],
                [
                    'type' => 'item',
                    'label' => __('Comments'),
                    'screen' => 'comment',
                ]
            ],
            'screen' => ['all-posts', 'new-post', 'edit-post', 'term/post-category', 'term/post-tag', 'comment', 'new-term/post-category', 'edit-term/post-category', 'new-term/post-tag', 'edit-term/post-tag']
        ],
        /*page*/
        'page' => [
            'type' => 'parent',
            'label' => __('Page'),
            'icon' => 'fa-sticky-note',
            'id' => 'page',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Pages'),
                    'screen' => 'all-pages',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add new'),
                    'screen' => 'new-page',
                ]
            ],
            'screen' => ['all-pages', 'new-page', 'edit-page']
        ],

        /* Brew Club*/

        'brewclub' => [
            'type' => 'parent',
            'label' => __('Brew Club'),
            'icon' => 'fa-sticky-note',
            'id' => 'brewclub',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('Forum'),
                    'screen' => 'forum_list',
                ],
                [
                    'type' => 'item',
                    'label' => __('Categories'),
                    'screen' => 'all-forum-categories',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add New Category'),
                    'screen' => 'new-forum-category',
                ]
            ],
            'screen' => ['all-forum-categories','new-forum-category','edit-category','forum_list']
        ],

        /* Testimonials*/

           'testimonials' => [
            'type' => 'parent',
            'label' => __('Testimonial'),
            'icon' => 'fa-sticky-note',
            'id' => 'testimonials',
            'child' => [
                // [
                //     'type' => 'item',
                //     'label' => __('Forum'),
                //     'screen' => 'forum_list',
                // ],
                [
                    'type' => 'item',
                    'label' => __('Testimonial'),
                    'screen' => 'all-testimonials',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add New Testimonial'),
                    'screen' => 'new-testimonials',
                ]
            ],
            'screen' => ['all-testimonials','new-testimonials','edit-testimonials']
        ],

        /*  Countries */


        //  'countries' => [
        //     'type' => 'parent',
        //     'label' => __('Countries'),
        //     'icon' => 'fa-sticky-note',
        //     'id' => 'countries',
        //     'child' => [
              
        //         [
        //             'type' => 'item',
        //             'label' => __('Countries'),
        //             'screen' => 'all-countries',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Add New Countries'),
        //             'screen' => 'new-countries',
        //         ]
        //     ],
        //     'screen' => ['all-testimonials','new-testimonials','edit-testimonials']
        // ],

        /* Inclusion */

       // 'inclusion' => [
       //      'type' => 'parent',
       //      'label' => __('Packages'),
       //      'icon' => 'fa-sticky-note',
       //      'id' => 'inclusion',
       //      'child' => [
               
       //          [
       //              'type' => 'item',
       //              'label' => __('Inclusion'),
       //              'screen' => 'all-inclusion',
       //          ],
       //          [
       //              'type' => 'item',
       //              'label' => __('Add New inclusion'),
       //              'screen' => 'new-inclusion',
       //          ]
       //      ],
       //      'screen' => ['all-inclusion','new-inclusion','edit-inclusion','forum_list']
       //  ],


        'heading_service' => [
            'type' => 'heading',
            'services' => ['car', 'apartment', 'hotel', 'space', 'tour'],
            'label' => __('All Services')
        ],
        /*hotel*/
        'hotel' => [
            'type' => 'parent',
            'label' => __('Hotel'),
            'icon' => 'fa-building',
            'id' => 'hotel',
            'service' => 'hotel',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Hotels'),
                    'screen' => 'all-hotels',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add new Hotel'),
                    'screen' => 'new-hotel',
                ],
                [
                    'type' => 'item',
                    'label' => __('Property Types'),
                    'screen' => 'term/property-type',
                ],
                [
                    'type' => 'item',
                    'label' => __('Facilities'),
                    'screen' => 'term/hotel-facilities',
                ],
                [
                    'type' => 'item',
                    'label' => __('Hotel Services'),
                    'screen' => 'term/hotel-services',
                ],
                [
                    'type' => 'item',
                    'label' => __('Room Facilities'),
                    'screen' => 'term/room-facilities',
                ],
                [
                    'type' => 'item',
                    'label' => __('Reviews'),
                    'screen' => 'hotel-review',
                ],
                [
                    'type' => 'item',
                    'label' => __('Orders'),
                    'screen' => 'order/hotel',
                ],
            ],
            'screen' => ['all-hotels', 'new-hotel', 'edit-hotel', 'term/property-type', 'term/hotel-facilities', 'term/hotel-services', 'term/room-facilities', 'hotel-review', 'order/hotel', 'all-rooms', 'edit-room', 'new-term/property-type', 'edit-term/property-type', 'new-term/hotel-facilities', 'edit-term/hotel-facilities', 'new-term/hotel-services', 'edit-term/hotel-services', 'new-term/room-facilities', 'edit-term/room-facilities']
        ],
        /*apartments*/
        'apartment' => [
            'type' => 'parent',
            'label' => __('Apartment'),
            'icon' => 'fa-city',
            'id' => 'apartment',
            'service' => 'apartment',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Apartments'),
                    'screen' => 'all-apartments',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add new'),
                    'screen' => 'new-apartment',
                ],
                [
                    'type' => 'item',
                    'label' => __('Types'),
                    'screen' => 'term/apartment-type',
                ],
                [
                    'type' => 'item',
                    'label' => __('Amenities'),
                    'screen' => 'term/apartment-amenity',
                ],
                [
                    'type' => 'item',
                    'label' => __('Reviews'),
                    'screen' => 'apartment-review',
                ],
                [
                    'type' => 'item',
                    'label' => __('Orders'),
                    'screen' => 'order/apartment',
                ],
            ],
            'screen' => ['all-apartments', 'new-apartment', 'edit-apartment', 'term/apartment-type', 'term/apartment-amenity', 'apartment-review', 'order/apartment', 'new-term/apartment-type', 'edit-term/apartment-type', 'new-term/apartment-amenity', 'edit-term/apartment-amenity']
        ],
        /*car*/
        'car' => [
            'type' => 'parent',
            'label' => __('Car'),
            'icon' => 'fa-car',
            'id' => 'car',
            'service' => 'car',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Cars'),
                    'screen' => 'all-cars',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add new'),
                    'screen' => 'new-car',
                ],
                [
                    'type' => 'item',
                    'label' => __('Types'),
                    'screen' => 'term/car-type',
                ],
                [
                    'type' => 'item',
                    'label' => __('Features'),
                    'screen' => 'term/car-feature',
                ],
                [
                    'type' => 'item',
                    'label' => __('Equipments'),
                    'screen' => 'term/car-equipment',
                ],
                [
                    'type' => 'item',
                    'label' => __('Reviews'),
                    'screen' => 'car-review',
                ],
                [
                    'type' => 'item',
                    'label' => __('Orders'),
                    'screen' => 'order/car',
                ],
            ],
            'screen' => ['all-cars', 'new-car', 'edit-car', 'term/car-type', 'term/car-feature', 'term/car-equipment', 'car-review', 'order/car', 'new-term/car-type', 'edit-term/car-type', 'new-term/car-feature', 'edit-term/car-feature', 'new-term/car-equipment', 'edit-term/car-equipment']
        ],
        /*space*/
        // 'space' => [
        //     'type' => 'parent',
        //     'label' => __('Space'),
        //     'icon' => 'fa-hotel',
        //     'id' => 'space',
        //     'service' => 'space',
        //     'child' => [
        //         [
        //             'type' => 'item',
        //             'label' => __('All Space'),
        //             'screen' => 'all-space',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Add new'),
        //             'screen' => 'new-space',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Types'),
        //             'screen' => 'term/space-type',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Amenities'),
        //             'screen' => 'term/space-amenity',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Reviews'),
        //             'screen' => 'space-review',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Orders'),
        //             'screen' => 'order/space',
        //         ],
        //     ],
        //     'screen' => ['all-space', 'new-space', 'edit-space', 'term/space-type', 'term/space-amenity', 'space-review', 'order/space', 'new-term/space-type', 'edit-term/space-type', 'new-term/space-amenity', 'edit-term/space-amenity']
        // ],
        /*tour*/
        'tour' => [
            'type' => 'parent',
            'label' => __('Tour'),
            'icon' => 'fa-pennant',
            'id' => 'tour',
            'service' => 'tour',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Tours'),
                    'screen' => 'all-tours',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add new'),
                    'screen' => 'new-tour',
                ],
                [
                    'type' => 'item',
                    'label' => __('Types'),
                    'screen' => 'term/tour-type',
                ],
                [
                    'type' => 'item',
                    'label' => __('Tour Includes'),
                    'screen' => 'term/tour-include',
                ],
                [
                    'type' => 'item',
                    'label' => __('Tour Excludes'),
                    'screen' => 'term/tour-exclude',
                ],
                [
                    'type' => 'item',
                    'label' => __('Reviews'),
                    'screen' => 'tour-review',
                ],
                [
                    'type' => 'item',
                    'label' => __('Orders'),
                    'screen' => 'order/tour',
                ],
            ],
            'screen' => ['all-tours', 'new-tour', 'edit-tour', 'term/tour-type', 'term/tour-include', 'term/tour-exclude', 'tour-review', 'order/tour', 'new-term/tour-type', 'edit-term/tour-type', 'new-term/tour-include', 'edit-term/tour-include', 'new-term/tour-exclude', 'edit-term/tour-exclude']
        ],
        /*beauty*/
        // 'beauty' => [
        //     'type' => 'parent',
        //     'label' => __('Beauty Services'),
        //     'icon' => 'fa-spa',
        //     'id' => 'beauty',
        //     'service' => 'beauty',
        //     'child' => [
        //         [
        //             'type' => 'item',
        //             'label' => __('All Beauty'),
        //             'screen' => 'all-beauty',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Add new'),
        //             'screen' => 'new-beauty',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Service Categories'),
        //             'screen' => 'term/beauty-services',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Branch'),
        //             'screen' => 'term/beauty-branch',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Agent'),
        //             'screen' => 'beauty/all-agents',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Reviews'),
        //             'screen' => 'beauty-review',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Orders'),
        //             'screen' => 'order/beauty',
        //         ],
        //     ],
        //     'screen' => ['all-beauty', 'new-beauty', 'edit-beauty', 'term/beauty-services', 'beauty-review', 'order/beauty', 'beauty/all-agents', 'beauty/new-agent', 'beauty/edit-agent', 'term/beauty-branch']
        // ],
     /* Package */

 'Packages' => [
            'type' => 'parent',
            'label' => __('Packages'),
            'icon' => 'fa-pennant',
            'id' => 'package',
            'service' => 'package',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Packages'),
                    'screen' => 'all-package',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add new'),
                    'screen' => 'new-package',
                ],
                [
                    'type' => 'item',
                    'label' => __('Types'),
                    'screen' => 'term/package-type',
                ],
                [
                    'type' => 'item',
                    'label' => __('Packages Includes'),
                    'screen' => 'term/package-include',
                ],
                [
                    'type' => 'item',
                    'label' => __('Packages Excludes'),
                    'screen' => 'term/package-exclude',
                ],
                [
                    'type' => 'item',
                    'label' => __('Reviews'),
                    'screen' => 'package-review',
                ],
                [
                    'type' => 'item',
                    'label' => __('Orders'),
                    'screen' => 'order/package',
                ],
            ],
            
            'screen' => ['all-package', 'new-package', 'edit-package', 'term/package-type', 'term/package-include', 'term/package-exclude', 'package-review', 'order/package', 'new-term/package-type', 'edit-term/package-type', 'new-term/package-include', 'edit-term/package-include', 'new-term/package-exclude', 'edit-term/package-exclude']
        ],

        'heading_system' => [
            'type' => 'heading',
            'label' => __('System')
        ],
        'settings' => [
            'type' => 'item',
            'label' => __('Settings'),
            'icon' => 'fa-cog',
            'screen' => 'settings',
        ],
        'menu' => [
            'type' => 'item',
            'label' => __('Menus'),
            'icon' => 'fa-bars',
            'screen' => 'menu',
        ],
        /*[
           'type' => 'item',
           'label' => __('Plugins'),
           'icon' => 'icon_system_grid_layout',
           'screen' => 'plugins',
        ],*/
        'user' => [
            'type' => 'parent',
            'label' => __('Users'),
            'icon' => 'fa-user-friends',
            'id' => 'user',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Users'),
                    'screen' => 'all-users',
                ],
                [
                    'type' => 'item',
                    'label' => __('Partner Request'),
                    'screen' => 'partner-request',
                ]
            ],
            'screen' => ['all-users', 'partner-request']
        ],
        'media' => [
            'type' => 'item',
            'label' => __('Media'),
            'icon' => 'fa-images',
            'screen' => 'all-media',
        ],
        'language' => [
            'type' => 'parent',
            'label' => __('Language'),
            'icon' => 'fa-globe-americas',
            'id' => 'language',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('Setup'),
                    'screen' => 'language',
                ],
                [
                    'type' => 'item',
                    'label' => __('Translation'),
                    'screen' => 'translation',
                ]
            ],
            'screen' => ['language', 'translation']
        ],
        'coupon' => [
            'type' => 'item',
            'label' => __('Coupon'),
            'icon' => 'fa-sticky-note',
            'screen' => 'coupon',
        ],
        'tool' => [
            'type' => 'parent',
            'label' => __('Tools'),
            'icon' => 'fa-tools',
            'id' => 'tools',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('Import Data'),
                    'icon' => 'icon_system_import_02',
                    'screen' => 'import-data',
                ],
                [
                    'type' => 'item',
                    'label' => __('SEO'),
                    'icon' => 'icon_system_import_02',
                    'screen' => 'seo',
                ],
            ],
            'screen' => ['import-data']
        ],

    ],
    'partner_menu' => [
        'heading_general' => [
            'type' => 'heading',
            'label' => __('General')
        ],
        'dashboard' => [
            'type' => 'item',
            'label' => 'Dashboard',
            'icon' => 'fa-tachometer-alt',
            'screen' => 'dashboard',
        ],
        'your_profile' => [
            'type' => 'item',
            'label' => __('Your Profile'),
            'icon' => 'fa-user-circle',
            'screen' => 'profile',
        ],
        'notification' => [
            'type' => 'item',
            'label' => __('Notifications'),
            'icon' => 'fa-bell',
            'screen' => 'notifications',
        ],
        'my_order' => [
            'type' => 'item',
            'label' => __('My Orders'),
            'icon' => 'fa-ballot-check',
            'screen' => 'my-orders',
        ],
        'wishlist' => [
            'type' => 'item',
            'label' => __('Wishlist'),
            'icon' => 'fa-heart',
            'screen' => 'wishlist',
        ],
        'earning_report' => [
            'type' => 'parent',
            'label' => __('Earnings Report'),
            'icon' => 'fa-file-chart-line',
            'id' => 'report',
            'screen' => ['analytics'],
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('Analytics'),
                    'icon' => 'icon_system_communication',
                    'screen' => 'analytics',
                ],
                [
                    'type' => 'item',
                    'label' => __('Withdrawal'),
                    'icon' => 'icon_system_communication',
                    'screen' => 'withdrawal',
                ]
            ],
        ],
        'heading_service' => [
            'type' => 'heading',
            'services' => ['car', 'apartment', 'hotel', 'space', 'tour'],
            'label' => __('All Services')
        ],
        'hotel' => [
            'type' => 'parent',
            'label' => __('Hotel'),
            'icon' => 'fa-building',
            'id' => 'hotel',
            'service' => 'hotel',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Hotels'),
                    'screen' => 'all-hotels',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add new Hotel'),
                    'screen' => 'new-hotel',
                ],
                [
                    'type' => 'item',
                    'label' => __('Reviews'),
                    'screen' => 'hotel-review',
                ],
                [
                    'type' => 'item',
                    'label' => __('Orders'),
                    'screen' => 'order/hotel',
                ],
            ],
            'screen' => ['all-hotels', 'new-hotel', 'edit-hotel', 'hotel-review', 'order/hotel', 'all-rooms', 'edit-room']
        ],
        'apartment' => [
            'type' => 'parent',
            'label' => __('Apartment'),
            'icon' => 'fa-city',
            'id' => 'apartment',
            'service' => 'apartment',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Apartments'),
                    'screen' => 'all-apartments',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add new'),
                    'screen' => 'new-apartment',
                ],
                [
                    'type' => 'item',
                    'label' => __('Reviews'),
                    'screen' => 'apartment-review',
                ],
                [
                    'type' => 'item',
                    'label' => __('Orders'),
                    'screen' => 'order/apartment',
                ],
            ],
            'screen' => ['all-apartments', 'new-apartment', 'edit-apartment', 'apartment-review', 'order/apartment']
        ],
        'car' => [
            'type' => 'parent',
            'label' => __('Car'),
            'icon' => 'fa-car',
            'id' => 'car',
            'service' => 'car',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Cars'),
                    'screen' => 'all-cars',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add new'),
                    'screen' => 'new-car',
                ],
                [
                    'type' => 'item',
                    'label' => __('Reviews'),
                    'screen' => 'car-review',
                ],
                [
                    'type' => 'item',
                    'label' => __('Orders'),
                    'screen' => 'order/car',
                ],
            ],
            'screen' => ['all-cars', 'new-car', 'edit-car', 'car-review', 'order/car']
        ],
        // 'space' => [
        //     'type' => 'parent',
        //     'label' => __('Space'),
        //     'icon' => 'fa-hotel',
        //     'id' => 'space',
        //     'service' => 'space',
        //     'child' => [
        //         [
        //             'type' => 'item',
        //             'label' => __('All Space'),
        //             'screen' => 'all-space',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Add new'),
        //             'screen' => 'new-space',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Reviews'),
        //             'screen' => 'space-review',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Orders'),
        //             'screen' => 'order/space',
        //         ],
        //     ],
        //     'screen' => ['all-space', 'new-space', 'edit-space', 'space-review', 'order/space']
        // ],
        'tour' => [
            'type' => 'parent',
            'label' => __('Tour'),
            'icon' => 'fa-pennant',
            'id' => 'tour',
            'service' => 'tour',
            'child' => [
                [
                    'type' => 'item',
                    'label' => __('All Tours'),
                    'screen' => 'all-tours',
                ],
                [
                    'type' => 'item',
                    'label' => __('Add new'),
                    'screen' => 'new-tour',
                ],
                [
                    'type' => 'item',
                    'label' => __('Reviews'),
                    'screen' => 'tour-review',
                ],
                [
                    'type' => 'item',
                    'label' => __('Orders'),
                    'screen' => 'order/tour',
                ],
            ],
            'screen' => ['all-tours', 'new-tour', 'edit-tour', 'tour-review', 'order/tour']
        ],
        // 'beauty' => [
        //     'type' => 'parent',
        //     'label' => __('Beauty Services'),
        //     'icon' => 'fa-spa',
        //     'id' => 'beauty',
        //     'service' => 'beauty',
        //     'child' => [
        //         [
        //             'type' => 'item',
        //             'label' => __('All Beauty'),
        //             'screen' => 'all-beauty',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Add new'),
        //             'screen' => 'new-beauty',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Branch'),
        //             'screen' => 'term/beauty-branch',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Agent'),
        //             'screen' => 'beauty/all-agents',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Reviews'),
        //             'screen' => 'beauty-review',
        //         ],
        //         [
        //             'type' => 'item',
        //             'label' => __('Orders'),
        //             'screen' => 'order/beauty',
        //         ],
        //     ],
        //     'screen' => ['all-beauty', 'new-beauty', 'edit-beauty', 'term/beauty-services', 'beauty-review', 'order/beauty', 'beauty/all-agents', 'beauty/new-agent', 'beauty/edit-agent', 'term/beauty-branch']
        // ],
        'heading_system' => [
            'type' => 'heading',
            'label' => __('System')
        ],
        'media' => [
            'type' => 'item',
            'label' => __('Media'),
            'icon' => 'fa-images',
            'screen' => 'all-media',
        ],
    ],
    'customer_menu' => [
        'dashboard' => [
            'type' => 'item',
            'label' => 'Dashboard',
            'icon' => 'fa-tachometer-alt',
            'screen' => 'dashboard',
        ],
        'your_profile' => [
            'type' => 'item',
            'label' => __('Your Profile'),
            'icon' => 'fa-user-circle',
            'screen' => 'profile',
        ],
        'notification' => [
            'type' => 'item',
            'label' => __('Notifications'),
            'icon' => 'fa-bell',
            'screen' => 'notifications',
        ],
        'my_order' => [
            'type' => 'item',
            'label' => __('My Orders'),
            'icon' => 'fa-ballot-check',
            'screen' => 'my-orders',
        ],
        'wishlist' => [
            'type' => 'item',
            'label' => __('Wishlist'),
            'icon' => 'fa-heart',
            'screen' => 'wishlist',
        ]
    ]
];