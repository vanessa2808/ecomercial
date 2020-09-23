<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Favorite;
use App\Models\Comment;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'product_name',
        'description',
        'product_image',
        'price',
        'amount'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'product_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }

}
