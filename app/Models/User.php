<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'division_id',
    'name',
    'email',
    'identity_number',
    'phone',
    'institution',
    'address',
    'photo',
    'role',
    'status',
    'password'
])]

#[Hidden([
    'password',
    'remember_token'
])]

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // relasi ke Division
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
}
