<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'desc',
        'attachment',
        'remote_hours',
        'onsite_hours',
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class)->withTimestamps();
    }
}
