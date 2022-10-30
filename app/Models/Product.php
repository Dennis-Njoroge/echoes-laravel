<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'product_name',
        'product_qty',
        'product_price',
        'description',
        'units',
        'image'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
