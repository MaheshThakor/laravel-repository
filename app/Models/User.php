<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name','email','country_code','password',];

    protected $hidden = ['password','remember_token',];

    protected $casts = ['email_verified_at' => 'datetime',];

    public function country()
    {
        return $this->hasOne(User::class, 'country_code');
    }
}