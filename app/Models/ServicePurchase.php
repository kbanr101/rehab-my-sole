<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePurchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'pic_date',
        'address',
        'city',
        'number_shoes',
        'image',
        'comment',
        'status'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function order()
    {
        return $this->hasOne(ServiceOrder::class, 'service_purchase_id');
    }
}
