<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'branch_id',
        'folio',
        'customer_id',
        'amount',
        'discount_rate',
        'discount_amount',
        'tax_rate',
        'tax_amount',
        'status',
    ];

    public function user() {
        
        return $this->belongsTo('App\Models\User');
    }

    public function branch() {
        
        return $this->belongsTo('App\Models\Branch');
    }
}
