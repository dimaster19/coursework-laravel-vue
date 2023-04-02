<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'status',
        'count' ,
        'price' ,
        'user_id',
        'product_id',
        'delivery' ,
        'name' ,
        'phone' ,
    ];
}
