<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class withdrawRequest extends Model
{
    use HasFactory;
    
    protected $fillable = ['vendorId' , 'earning' , 'email' ,'account_detail'];
}