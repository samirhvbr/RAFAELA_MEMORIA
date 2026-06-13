<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Credenciais do Admin
    |--------------------------------------------------------------------------
    |
    | O painel administrativo usa um login único baseado em flag de sessão.
    | A senha é guardada como HASH (bcrypt/argon) no .env — nunca em texto puro.
    |
    | Gere o hash com:
    |   php artisan tinker --execute="echo Hash::make('SUA_SENHA');"
    |
    | Fail-closed: sem ADMIN_EMAIL ou ADMIN_PASSWORD_HASH configurados, o login
    | é sempre rejeitado (ver App\Http\Controllers\Admin\AuthController).
    |
    */

    'email' => env('ADMIN_EMAIL'),

    'password_hash' => env('ADMIN_PASSWORD_HASH'),

];
