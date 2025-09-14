<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'class_level',
        'class_group',
        'major',
        'points',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Accessor untuk format nama masker (An** Sa*****)
    public function getMaskedNameAttribute()
    {
        return collect(explode(' ', $this->name))
            ->map(function ($part) {
                return substr($part, 0, 2) . str_repeat('*', strlen($part) - 2);
            })
            ->implode(' ');
    }
}
