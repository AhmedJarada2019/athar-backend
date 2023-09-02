<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
        'verification_code',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_verified'       => 'boolean',
        'password'          => 'hashed',
    ];

    public function password(): Attribute
    {
        return Attribute::make(set: function ($value) {
            if (!$value) {
                $value = $this->password;
            }

            return Hash::needsRehash($value) ?
                Hash::make($value) :
                $value;
        }
        );
    }

    public function isProfileCompleted(): Attribute
    {
        return Attribute::make(get: fn() => $this->first_name && $this->last_name
            && $this->email && $this->national_identity && $this->birthday);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function smsHistories()
    {
        return $this->hasMany(SmsHistory::class);
    }

    protected static function booted()
    {
        self::updating(function (self $user) {
            $user->name = $user->first_name.' '.$user->last_name;
        });
    }
}
