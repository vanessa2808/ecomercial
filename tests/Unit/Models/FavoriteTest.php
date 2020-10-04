<?php

namespace Tests\Unit\Models;

use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;
    protected $favorite;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function favorite_database_has_expected_columns()
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

    public function test_contains_valid_fillable_properties()
    {
        $favorite = new Favorite();
        $this->assertEquals([
            'product_id',
            'user_id',
        ], $favorite->getFillable());
    }

    public function a_favorite_belongs_to_user()
    {
        $favorite = new Favorite();
        $user_id = $favorite->user();
        $this->assertBelongsToRelation($user_id, $favorite, new Favorite());
    }

    public function a_favorite_belongs_to_product()
    {
        $favorite = new Favorite();
        $product_id = $favorite->product();
        $this->assertBelongsToRelation($product_id, $favorite, new Favorite());
    }

}
