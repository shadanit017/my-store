<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['id','user_id', 'product_id', 'payment_intent_id', 'payment_method', 'amount', 'currency', 'status'];
}
