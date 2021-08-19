<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review_dislike extends Model
{
    use HasFactory;
    protected $table = 'review_dislike';
    public $timestamps = false;

    protected $fillable = [
        'review_id',
        'user_id',
        'product_id',
    ];
}
