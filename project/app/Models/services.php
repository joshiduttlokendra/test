<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'marketId',
        'imageUrl',
        'adminCommission',
        'location',
        'city',
        'country',
        'price',
        'status',
        'adminApproval',
        'availability_date',
        'mobility',
    ];
}
