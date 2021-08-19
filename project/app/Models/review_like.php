<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review_like extends Model
{
    use HasFactory;
    protected $table = 'review_like';
    public $timestamps = false;

    protected $fillable = [
        'review_id',
        'user_id',
        'product_id',
  
    ];
}
