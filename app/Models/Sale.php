<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'order_purchase_id',
        'customer_id',
        'amount',
        'balance'
    ];

    public function user() {
        
        return $this->belongsTo('App\Models\User');
    }

    public function order_purchase() {
        
        return $this->belongsTo('App\Models\OrdenPurchase');
    }

    public function customer() {
        
        return $this->belongsTo('App\Models\Customer');
    }
}
