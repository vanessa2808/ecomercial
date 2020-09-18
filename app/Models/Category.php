<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Suggest;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'category_name',
        'parent_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function suggests()
    {
        return $this->hasMany(Suggest::class, 'category_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

}
