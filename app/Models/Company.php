<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Company extends Model
{
    use HasFactory;
    use Billable;

    protected $fillable = [
        'name',
        'email',
        'tel',
        'postal_address',
        'stripe_id'
    ];

    public function tickets ()
    {
        return $this->belongsToMany(Ticket::class)->withTimestamps();
    }

    public function contracts ()
    {
        return $this->belongsToMany(Contract::class)->withTimestamps();
    }

    public function users ()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
