<?php
return [
    'logo' => env('LOGO_PATH'),
    'small_logo' => env('SMALL_LOGO_PATH'),

    'superadmin' => [
        'email' => env('SUPERADMIN_EMAIL'),
        'password' => env('SUPERADMIN_PASSWORD'),
    ],

    'menu' => [
        'dashboard' => [
            'text' => 'Dashboard',
            'route' => 'dashboard',
            'submenu' => []
        ],
        'users' => [
            'text' => 'Utenti',
            'route' => 'user.index',
            'submenu' => []
        ]
    ]
];
