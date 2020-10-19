<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Suggest;
use App\Models\User;
use Tests\TestCase;

class SuggestTest extends TestCase
{
    protected $suggest;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->suggest = new Suggest();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->suggest);
    }

    public function test_table_name()
    {
        $this->assertEquals('suggests', $this->suggest->getTable());
    }

    public function suggests_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('products', [
                'id',
                'user_id',
                'product_name',
                'product_image',
                'description',
                'reason',
                'category_id',
                'status',
            ]),
            1
        );
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'user_id',
            'product_name',
            'product_image',
            'description',
            'reason',
            'category_id',
            'status',
        ], $this->suggest->getFillable());
    }

    public function test_key_name()
    {
        $this->assertEquals('id', $this->suggest->getKeyName());
    }

    public function test_user_relation()
    {
        $this->belongsTo_relation_test(
            User::class,
            'user_id',
            'id',
            $this->suggest->user()
        );
    }

    public function test_category_relation()
    {
        $this->belongsTo_relation_test(
            Category::class,
            'category_id',
            'id',
            $this->suggest->category()
        );
    }

}
