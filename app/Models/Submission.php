<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'user_id',
        'assigned_division_id',
        'assigned_staff_id',
        'assigned_admin_id',
        'type',
        'title',
        'description',
        'location',
        'document_file',
        'start_date',
        'end_date',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'assigned_division_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'assigned_staff_id');
    }
    public function admin()
    {
        return $this->belongsTo(User::class, 'assigned_admin_id');
    }
}
