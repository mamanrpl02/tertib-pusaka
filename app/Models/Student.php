<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'class_level',  // 10, 11, 12
        'class_group',  // A, B, C
        'major',        // RPL, TBSM, dll
        'points',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Masker nama: An** Sa*****
    public function getMaskedNameAttribute()
    {
        return collect(explode(' ', $this->name))
            ->map(function ($part) {
                return substr($part, 0, 2) . str_repeat('*', max(strlen($part) - 2, 0));
            })
            ->implode(' ');
    }
}
