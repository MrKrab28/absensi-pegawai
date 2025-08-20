<?php
return [

    'admin' => [
        'Home' => [
            'title' => 'Menu',
            'items' => [
                [
                    'route-active' => 'dashboard',
                    'label' => 'Dashboard',
                    'icon' => 'layout-dashboard',
                    'route-name' => 'admin.dashboard',

                ]
            ]
        ],

        'Attendances' => [
            'title' => 'Attendances',
            'items' => [
                [
                    'route-active' => 'absensi',
                    'label' => 'Attendance',
                    'icon' => 'calendar-user',
                    'route-name' => null,
                ],
                [
                    'route-active' => 'shift-kerja',
                    'label' => 'Employee Shifts',
                    'icon' => 'calendar-stats',
                    'route-name' => 'admin.work-type',

                ],

            ]
        ],

        'Master' => [
            'title' => 'Master',
            'items' => [
                [
                    'route-active' => 'users',
                    'label' => 'Users',
                    'icon' => 'users',
                    'route-name' => 'admin.user',

                ],
                [
                    'route-active' => 'pegawai',
                    'label' => 'Employees',
                    'icon' => 'friends',
                    'route-name' => 'admin.pegawai',

                ],
                [
                    'route-active' => 'jabatan',
                    'label' => 'Positions',
                    'icon' => 'user-cog',
                    'route-name' => 'admin.jabatan',

                ],
                [
                    'route-active' => 'department',
                    'label' => 'Departments',
                    'icon' => 'buildings',
                    'route-name' => 'admin.department',

                ],
                [
                    'route-active' => 'shift',
                    'label' => 'Shift Schedules',
                    'icon' => 'calendar-cog',
                    'route-name' => 'admin.shift',

                ],

                [
                    'route-active' => 'status-pegawai',
                    'label' => 'Employment Status',
                    'icon' => 'report-search',
                    'route-name' => 'admin.status-pegawai',

                ],
                [
                    'route-active' => 'work-type',
                    'label' => 'Work Type',
                    'icon' => 'briefcase',
                    'route-name' => 'admin.work-type',

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
                    // 'route-name' => '',
                    'submenu' => [
                        [
                            'route-active' => 'roadmap.frontend',
                            'label' => 'Frontend',
                            'route-name' => null,
                        ],
                        [
                            'route-active' => 'roadmap.backend',
                            'label' => 'Backend',
                            'route-name' => null,
                        ],
                        [
                            'route-active' => 'roadmap.devops',
                            'label' => 'DevOps',
                            'route-name' => null,
                        ],
                    ]
                ],
            ]
        ],
    ],

    'user' => [
        'Home' => [
            'title' => 'Menu',
            'items' => [
                [
                    'route-active' => 'dashboard',
                    'label' => 'Dashboard',
                    'icon' => 'layout-dashboard',
                    'route-name' => 'admin.dashboard',

                ]
            ]
        ],



        'Master' => [
            'title' => 'Master',
            'items' => [
                [
                    'route-active' => 'users',
                    'label' => 'Users',
                    'icon' => 'users',
                    'route-name' => 'admin.user',

                ],
                [
                    'route-active' => 'category',
                    'label' => 'Category',
                    'icon' => 'cpu',
                    'route-name' => null,

                ],
                [
                    'route-active' => 'course',
                    'label' => 'Course',
                    'icon' => 'book-2',
                    'route-name' => null,

                ],
                [
                    'route-active' => 'materi',
                    'label' => 'Modul',
                    'icon' => 'book',
                    'route-name' => null,

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
                    // 'route-name' => '',
                    'submenu' => [
                        [
                            'route-active' => 'roadmap.frontend',
                            'label' => 'Frontend',
                            'route-name' => 'admin.user',
                        ],
                        [
                            'route-active' => 'roadmap.backend',
                            'label' => 'Backend',
                            'route-name' => 'admin.user',
                        ],
                        [
                            'route-active' => 'roadmap.devops',
                            'label' => 'DevOps',
                            'route-name' => 'admin.user',
                        ],
                    ]
                ],
            ]
        ],
    ],




];
