<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const USER = 0;
    const ADMIN = 1;
    const SUPER_ADMIN = 2;


    public static function getRoles()
    {
        return [
            self::USER => 'USER',
            self::ADMIN => 'ADMIN',
            self::SUPER_ADMIN => 'SUPER_ADMIN',
        ];
    }

    public static function getRoleAsString($role)
    {
        $roles = [
            self::USER => 'USER',
            self::ADMIN => 'ADMIN',
            self::SUPER_ADMIN => 'SUPER_ADMIN',
        ];
        return $roles[$role] ?? 'Unknown Role';
    }
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
