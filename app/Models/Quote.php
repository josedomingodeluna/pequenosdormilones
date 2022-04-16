<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'branch_id',
        'folio_id',
        'customer_name',
        'amount',
        'status',
    ];
    public function user() {
        
        return $this->belongsTo('App\Models\User');
    }

    public function branch() {
        
        return $this->belongsTo('App\Models\Branch');
    }
}
