<?php

namespace Tests\Unit\Models;

use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class FavoriteTest extends TestCase
{
    protected $favorite;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->favorite = new Favorite();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->favorite);
    }

    public function test_table_name()
    {
        $this->assertEquals('favorites', $this->favorite->getTable());
    }

    public function favorites_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('favorites', [
                'id',
                'product_id',
                'user_id',
            ]),
            1
        );
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'product_id',
            'user_id',
        ], $this->favorite->getFillable());
    }

    public function test_key_name()
    {
        $this->assertEquals('id', $this->favorite->getKeyName());
    }

    public function test_user_relation()
    {
        $this->belongsTo_relation_test(
            User::class,
            'user_id',
            'id',
            $this->favorite->user()
        );
    }

    public function test_product_relation()
    {
        $this->belongsTo_relation_test(
            Product::class,
            'product_id',
            'id',
            $this->favorite->product()
        );
    }

}
