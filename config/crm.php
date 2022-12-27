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
            'icon' => 'element.svg',
            'text' => 'Dashboard',
            'route' => 'dashboard',
            'submenu' => []
        ],
        'tasks' => [
            'icon' => 'calendar.svg',
            'text' => 'Appuntamenti',
            'route' => null,
            'submenu' => [
                [
                    'text' => 'Tutti gli appuntamenti',
                    'route' => 'task.index'
                ],
                [
                    'text' => 'Categorie',
                    'route' => 'taskcategory.index'
                ],
                [
                    'text' => 'Gestione Stati',
                    'route' => 'taskstatus.index'
                ]
            ]
        ],
        'customers' => [
            'icon' => 'user-octagon.svg',
            'text' => 'Clienti',
            'route' => 'customer.index',
            'submenu' => []
        ],
        'contracts' => [
            'icon' => 'book.svg',
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
                ],
                [
                    'text' => 'Categorie',
                    'route' => 'contractcategory.index'
                ]
            ]
        ],
        'products' => [
            'icon' => 'layer.svg',
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
        'users' => [
            'icon' => 'profile-2user.svg',
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
        'settings' => [
            'icon' => 'setting.svg',
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
    ],

    'document_types' => ['PATENTE' => 'Patente di guida', 'CARTA_IDENTITA' => "Carta d'identità", 'PASSAPORTO' => 'Passaporto'],

    'payment_methods' => ['BOLLETTINO_POSTALE' => 'Bollettino postale', 'DOMICILIAZIONE_BANCARIA' => "Domiciliazione bancaria", 'BONIFICO' => 'Bonifico Bancario', 'FINANZIAMENTO' => 'Finanziamento']
];
