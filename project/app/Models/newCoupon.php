<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newCoupon extends Model
{
    use HasFactory;
    protected $fillable = ['coupon_type','coupon_code','coupon_name' , 'discount','buy' , 'get' , 'status', 'type' , 'data_id',
    'subscription','start_of_valid' , 'end_of_valid'];
}
