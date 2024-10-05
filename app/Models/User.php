<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }


    /**
     * Get the user's role.
     *
     */
    protected function role(): Attribute
    {
        return new Attribute(
            get: fn() =>  UserRole::from($this->role_id)->name()
        );
    }


    /**
     * Save the password when user created
     *
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => Hash::needsRehash($value) ? bcrypt($value) : $value,
        );
    }


    public function statusLabel()
    {
        return match ($this->role_id) {
            UserRole::ADMIN->value => 'green',
            UserRole::MANAGER->value => 'indigo',
            default => null,
        };
    }
}
