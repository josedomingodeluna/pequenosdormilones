<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = 
    [
            'first_name',
            'last_name',
            'rfc',
            'curp',
            'address',
            'phone',
            'notes',
            'payment_frequency_id',
            'salary',
    ];

    public function payment_frequency() {
        
        return $this->belongsTo('App\Models\PaymentFrequency');
    }
}
