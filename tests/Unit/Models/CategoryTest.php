<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Suggest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    protected $category;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function categories_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('categories', [
                'id',
                'category_name',
                'parent_id',
            ]),
            1
        );
    }

    public function test_contains_valid_fillable_properties()
    {
        $category = new Category();
        $this->assertEquals([
            'category_name',
            'parent_id',
        ], $category->getFillable());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = Category::firstOrCreate(['category_name' => 'Fruit'], [
            'category_name' => 'Fruit',
            'parent_id' => null,
        ]);
    }

    public function a_category_has_many_product()
    {
        $category = new Category();
        $product = $category->products();
        $this->assertHasManyRelation($product, $category, new Product());
    }

    public function test_category_has_many_products()
    {
        $category = $this->category;

        $product = Product::firstOrCreate(['category_id' => $category->id], [
            'category_id' => $category->id,
            'product_name' => 'orange_juice',
            'description' => 'Good tasty',
            'product_image' => 'default.png',
            'price' => '30.0',
            'created_at' => '2020/3/3',
            'updated_at' => '2020/3/3',
        ]);
        $this->assertTrue($category->products->contains($product));
        $this->assertInstanceOf(Collection::class, $category->products);
    }

    public function a_category_has_many_suggest()
    {
        $category = new Category();
        $suggest = $category->suggests();
        $this->assertHasManyRelation($suggest, $category, new Suggest());
    }

    public function a_category_belongs_to_a_parent()
    {
        $category = new Category();
        $parent_id = $category->parent();
        $this->assertBelongsToRelation($parent_id, $category, new Category());
    }

    public function a_category_has_many_children()
    {
        $category = new Category();
        $category_name = $category->childrens();
        $this->assertHasManyRelation($category_name, $category, new Category());
    }

}
