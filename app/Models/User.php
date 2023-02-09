<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name', 
        'last_name',
        'email', 
        'phone_number',
        'password',
        'company_name',
        'street_address',
        'city',
        'state',
        'country'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];    

    public function campaigns()
    {
        return $this->hasMany('App\Models\Campaign');
    }

    public function getEmailVerificationUrlAttribute()
    {
        $token = encrypt($this->email."|".time());

        return route('email-verification', ['token' => $token]);
    }    
}
