<?php

use Laravel\Sanctum\Sanctum;

return [



'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', 'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1,34.101.66.3')),


    'guard' => ['web'],


    'expiration' => null,


    'token_prefix' => env('SANCTUM_TOKEN_PREFIX', ''),


    'middleware' => [
        'verify_csrf_token' => App\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => App\Http\Middleware\EncryptCookies::class,
    ],

];
