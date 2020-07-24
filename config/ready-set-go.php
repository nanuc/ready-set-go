<?php

return [
    'app' => [
        'route' => env('RSG_APP_ROUTE', '/app'),
        'template' => env('RSG_APP_TEMPLATE', 'light-nav-with-bottom-border'),
    ],
    'subscription' => [
        'activated' => env('RSG_SUBSCRIPTION_ACTIVATED', false),
    ],
    'auth' => [
        'registration' => [
            'enabled' => env('RSG_REGISTRATION_ENABLED', true),
        ]
    ]
];