<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_purchase_id',
        'delivery_amount',
        'charge_amount',
        'total_amount',
        'status'
    ];
}
