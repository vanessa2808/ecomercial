<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Suggest extends Model
{
    protected $table = 'suggests';
    protected $fillable = [
        'user_id',
        'product_name',
        'product_image',
        'description',
        'reason',
        'category_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
