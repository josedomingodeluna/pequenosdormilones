<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'sale_id',
        'purchase_order_id',
        'user_id',
        'customer_id',
        'reference',
        'payment_method_id',
        'balance',
        'amount',
        'concept',
    ];

    public function purchase_order() {
        return $this->belongsTo('App\Models\PurchaseOrder');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function customer() {
        return $this->belongsTo('App\Models\PurchaseOrder');
    }

    public function payment_method() {
        return $this->belongsTo('App\Models\PaymentMethod');
    }
}
