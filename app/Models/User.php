<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Modelo padrão do Laravel mantido apenas para compatibilidade com
 * config/auth.php. Este projeto NÃO possui autenticação de usuário final —
 * o painel admin usa flag de sessão (App\Http\Middleware\AdminAuth).
 */
class User extends Authenticatable
{
    use Notifiable;

    /** @var list<string> */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /** @var list<string> */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
