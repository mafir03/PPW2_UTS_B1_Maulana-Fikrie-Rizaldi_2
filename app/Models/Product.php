<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // # 7 nambah table dan fillable
    protected $table = 'products';
    protected $fillable = ['id', 'code', 'name', 'quantity', 'price', 'description'];
}
