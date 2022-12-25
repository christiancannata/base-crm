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
            'route' => null,
            'submenu' => [
                [
                    'text' => 'Tutti gli utenti',
                    'route' => 'user.index'
                ],
                [
                    'text' => 'Ruoli',
                    'route' => 'role.index'
                ]
            ]
        ],
        'contracts' => [
            'text' => 'Contratti',
            'route' => null,
            'submenu' => [
                [
                    'text' => 'Tutti i contratti',
                    'route' => 'contract.index'
                ],
                [
                    'text' => 'Gestione Stati',
                    'route' => 'contractstatus.index'
                ]
            ]
        ],
        'customers' => [
            'text' => 'Clienti',
            'route' => 'customer.index',
            'submenu' => []
        ],
        'tasks' => [
            'text' => 'Appuntamenti',
            'route' => 'task.index',
            'submenu' => []
        ],
        'products' => [
            'text' => 'Prodotti',
            'route' => null,
            'submenu' => [
                [
                    'text' => 'Tutti i prodotti',
                    'route' => 'product.index'
                ],
                [
                    'text' => 'Categorie',
                    'route' => 'productcategory.index'
                ]
            ]
        ],
        'settings' => [
            'text' => 'Impostazioni',
            'route' => null,
            'submenu' => [
                [
                    'text' => 'Campi aggiuntivi',
                    'route' => 'setting.additional_fields'
                ]
            ]
        ]
    ],

    'additional_fields_entities' => [
        \App\Models\User::class => 'Utente',
        \Modules\Customer\Entities\Customer::class => 'Cliente',
        \Modules\Contract\Entities\Contract::class => 'Contratto',
    ]
];
