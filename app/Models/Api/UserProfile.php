<?php

namespace App\Models\Api;

use Database\Factories\Api\UserProfileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserProfile extends Model
{
    /** @use HasFactory<UserProfileFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'two_factor_code'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
