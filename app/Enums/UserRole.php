<?php

namespace App\Enums;

enum UserRole: int
{
    case ADMIN = 1;
    case  USER = 2;

    public function name(): string
    {
        return match ($this) {
            UserRole::ADMIN => 'Admin',
            UserRole::USER => 'User',
        };
    }
}
