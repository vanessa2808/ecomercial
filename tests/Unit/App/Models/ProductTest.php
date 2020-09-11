<?php

namespace Tests\Unit\App\Models;

use App\Models\Category;
use App\Models\Favorite;
use App\Models\OrderDetail;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;


class ProductTest extends TestCase
{
    use RefreshDatabase;
    protected $product;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function products_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('products', [
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

    public function test_contains_valid_fillable_properties()
    {
        $product = new Product();
        $this->assertEquals([
            'category_id',
            'product_name',
            'description',
            'product_image',
            'price',
            'amount'
        ], $product->getFillable());
    }

    public function a_product_has_many_order_detail()
    {
        $product = new Product();
        $order_detail = $product->order_details();
        $this->assertHasManyRelation($order_detail, $product, new OrderDetail());
    }

    public function a_product_has_many_favorite()
    {
        $product = new Product();
        $favorite = $product->favorites();
        $this->assertHasManyRelation($favorite, $product, new Favorite());
    }

    public function a_product_has_many_comment()
    {
        $product = new Product();
        $comment = $product->comments();
        $this->assertHasManyRelation($comment, $product, new Comment());
    }

    public function a_product_belongs_to_category()
    {
        $product = new Product();
        $category_id = $product->category();
        $this->assertBelongsToRelation($category_id, $product, new Product());
    }

    protected function setUp(): void {
        parent::setUp();
        $category = new Category([
            'id' => 1,
            'category_name' => 'Fruit',
            'parent_id' => null,
        ]);
        $category->save();
        $product = Product::firstOrCreate(['category_id' => $category->id], [
            'id' => 1,
            'category_id' => $category->id,
            'product_name' => 'orange_juice',
            'description' => 'Good tasty',
            'product_image' => 'default.png',
            'price' => '30.0',
            'created_at' => '2020/3/3',
            'updated_at' => '2020/3/3',
        ]);
        $product->save();
        $this->assertEquals($category->id, $product->category_id);
    }

}
