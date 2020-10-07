<?php

namespace Tests\Feature\views\users;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProductTest extends TestCase
{
    use RefreshDatabase;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function it_can_show_the_categories_and_products()
    {
        $category = new Category([
            'id' => 1,
            'category_name' => 'Fruit',
            'parent_id' => null,
        ]);
        $category->save();
        $data = [
            'category_id' => $category->id,
            'product_name' => 'Orange Juice',
            'description' => 'new tasty',
            'product_image' => 'default.png',
            'price' => 3.00,
        ];
        $product = $this->productRepositoryMock->create($data);
        $productRepo = new Product($product);
        $productRepo->product_cate([$category->id]);

        $this
            ->get(route('admin.categories.index'))
            ->assertStatus(200)
            ->assertSee($category->category_name)
            ->assertSee($category->parent_id)
            ->assertSee($product->category->category_name)
            ->assertSee($product->product_name)
            ->assertSee($product->description)
            ->assertSee($product->product_image)
            ->assertSee($product->price);
    }

}
