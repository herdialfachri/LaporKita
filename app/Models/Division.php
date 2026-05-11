<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function submissions()
    {
        return $this->hasMany(Submission::class, 'assigned_division_id');
    }

    public function staff()
    {
        return $this->hasMany(User::class, 'division_id');
    }
}
