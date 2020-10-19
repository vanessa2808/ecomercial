<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class ProductTest extends TestCase
{
    protected $product;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->product = new Product();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->product);
    }

    public function test_table_name()
    {
        $this->assertEquals('products', $this->product->getTable());
    }

    public function products_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('products', [
                'id',
                'category_id',
                'product_name',
                'description',
                'product_image',
                'price',
                'amount'
            ]),
            1
        );
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'category_id',
            'product_name',
            'description',
            'product_image',
            'price',
            'amount'
        ], $this->product->getFillable());
    }

    public function test_key_name()
    {
        $this->assertEquals('id', $this->product->getKeyName());
    }

    public function test_category_relation()
    {
        $this->belongsTo_relation_test(
            Category::class,
            'category_id',
            'id',
            $this->product->category()
        );
    }

    public function test_orderDetails_relation()
    {
        $this->hasMany_relation_test(
            OrderDetail::class,
            'product_id',
            $this->product->order_details()
        );
    }

    public function test_favorites_relation()
    {
        $this->hasMany_relation_test(
            Favorite::class,
            'product_id',
            $this->product->favorites()
        );
    }

    public function test_comments_relation()
    {
        $this->hasMany_relation_test(
            Comment::class,
            'product_id',
            $this->product->comments()
        );
    }

}
