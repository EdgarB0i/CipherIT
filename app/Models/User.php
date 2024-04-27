<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'birthday', 'gender', 'address'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPhoneAttribute($value)
    {

        $this->attributes['phone'] = Crypt::encrypt($value);

    }


    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = Crypt::encrypt($value);

    }


    public function getPhoneAttribute($value)
    {
        return Crypt::decrypt($value);
    }


    public function getAddressAttribute($value)
    {
        return Crypt::decrypt($value);
    }
}
