<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nickname', 'avatar', 'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 投稿した写真の取得
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function photos()
    {
        return $this->hasOne('App\Models\instagram\Photos', 'user_id');
    }

    /**
     * いいねの取得
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function likes()
    {
        return $this->hasOne('App\Models\instagram\Likes', 'user_id');
    }
}
