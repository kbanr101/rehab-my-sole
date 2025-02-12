<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePurchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'service_name',
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
}
