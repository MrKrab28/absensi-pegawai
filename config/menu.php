<?php
return [

    'Home' => [
        'title' => 'Menu',
        'items' => [
            [
                'route-active' => 'dashboard',
                'label' => 'Dashboard',
                'icon' => 'layout-dashboard',
                'route-name' => '#',

            ]
        ]
    ],



    'Master' => [
        'title' => 'Master',
        'items' => [
            [
                'route-active' => 'user',
                'label' => 'Users',
                'icon' => 'users',
                'route-name' => '#',

            ],
            [
                'route-active' => 'category',
                'label' => 'Category',
                'icon' => 'cpu',
                'route-name' => '#',

            ],
            [
                'route-active' => 'course',
                'label' => 'Course',
                'icon' => 'book-2',
                'route-name' => '#',

            ],
            [
                'route-active' => 'materi',
                'label' => 'Modul',
                'icon' => 'book',
                'route-name' => '#',

            ],
        ]
    ],


    'Roadmap' => [
        'title' => 'Roadmap',
        'items' =>
        [
            [
                'route-active' => 'roadmap.*',
                'label' => 'Roadmap',
                'icon' => 'share',
                'route-name' => 'roadmap.index',
                'submenu' => [
                    [
                        'route-active' => 'roadmap.frontend',
                        'label' => 'Frontend',
                        'route-name' => 'roadmap.frontend',
                    ],
                    [
                        'route-active' => 'roadmap.backend',
                        'label' => 'Backend',
                        'route-name' => 'roadmap.backend',
                    ],
                    [
                        'route-active' => 'roadmap.devops',
                        'label' => 'DevOps',
                        'route-name' => 'roadmap.devops',
                    ],
                ]
            ],
        ]
    ],




];
