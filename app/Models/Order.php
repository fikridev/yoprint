<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'product_title',
        'product_description',
        'style#',
        'sanmar_mainframe_color',
        'size',
        'color_name',
        'piece_price'
    ];
}
