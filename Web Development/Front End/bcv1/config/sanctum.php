<?php

use Laravel\Sanctum\Sanctum;

return [



'stateful' => explode(',', env(
    'SANCTUM_STATEFUL_DOMAINS',
    'localhost,127.0.0.1,34.101.66.3:8000'
)),


    'guard' => ['web'],


    'expiration' => env('SANCTUM_TOKEN_EXPIRATION_MINUTES', '60'),


    'token_prefix' => env('SANCTUM_TOKEN_PREFIX', ''),


    'middleware' => [
        'verify_csrf_token' => App\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => App\Http\Middleware\EncryptCookies::class,
    ],

];
