<?php

namespace App\Enums;

enum Roles: string
{
    case ADMIN = 'admin';
    case USER = 'user';

    public function label(): string
    {
        return match ($this) {
            Roles::ADMIN => 'Admins',
            Roles::USER => 'Users',
        };
    }
}
