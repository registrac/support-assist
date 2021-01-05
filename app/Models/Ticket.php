<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'mode',
        'priority',
        'status',
        'attachment',
        'notes',
        'start',
        'end',
        'total_hours',
        'override_total_hours',
        'notify',
    ];

    public function users ()
    {
        return $this->belongsToMany(User::class);
    }

    public function company ()
    {
        return $this->belongsToMany(Company::class)->withTimestamps();
    }
}
