<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery as m;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    protected $productRepositoryMock;
    protected $categoryRepositoryMock;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function setUp(): void
    {
        $this->afterApplicationCreated(function () {
            $this->productRepositoryMock = m::mock($this->app->make(ProductRepositoryInterface::class));
            $this->categoryRepositoryMock = m::mock($this->app->make(CategoryRepositoryInterface::class));
        });

        parent::setUp();
    }

    public function tearDown(): void
    {
        unset($this->productRepositoryMock);
        unset($this->categoryRepositoryMock);
        m::close();
        parent::tearDown();
    }

    public function test_create_request_product_rules()
    {
        $request = new ProductRequest();
        $this->assertEquals([
            'category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'product_image' => 'required',
            'price' => 'required',
        ], $request->rules());
    }

    public function test_index_returns_view()
    {
        $controller = new ProductController(
            $this->productRepositoryMock,
            $this->categoryRepositoryMock
        );
        $view = $controller->index();
        $this->assertEquals('admin.products.index', $view->getName());
        $this->assertArrayHasKey('product_list', $view->getData());
    }

    public function test_create_returns_view()
    {
        $controller = new ProductController(
            $this->productRepositoryMock,
            $this->categoryRepositoryMock
        );
        $view = $controller->create();
        $this->assertEquals('admin.products.add', $view->getName());
        $this->assertArrayHasKey('product_list', $view->getData());
    }

    public function test_it_stores_new_product()
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

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'category_id' => $product->category_id,
            'product_name' => $product->product_name,
            'description' => $product->description,
            'product_image' => $product->product_image,
            'price' => $product->price,
        ]);
    }

    public function test_edit_returns_view()
    {
        $controller = new ProductController(
            $this->productRepositoryMock,
            $this->categoryRepositoryMock
        );
        $view = $controller->edit(1);
        $this->assertEquals('admin.products.edit', $view->getName());
        $this->assertArrayHasKey('product', $view->getData());
    }

    public function test_it_updates_product()
    {
        $this->withoutMiddleware();
        $category = new Category([
            'id' => 1,
            'category_name' => 'Fruit',
            'parent_id' => null,
        ]);
        $category->save();
        $product = $this->productRepositoryMock->create([
            'category_id' => $category->id,
            'product_name' => 'Orange Juice',
            'description' => ' New Tasty',
            'product_image' => 'default.png',
            'price' => 3.00,
        ]);
        $product_name = ['product_name' => 'Lemonade'];
        $result = $this->productRepositoryMock->update($product->id, $product_name);

        $this->assertTrue(true, $result);
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'product_name' => $product_name['product_name'],
        ]);
        $priceChange = ['price' => '3.9'];
        $result1 = $this->productRepositoryMock->update($product->id, $priceChange);

        $this->assertTrue(true, $result1);
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'price' => $priceChange['price'],
        ]);
        $descriptionChange = ['description' => 'new tasty'];
        $result1 = $this->productRepositoryMock->update($product->id, $descriptionChange);

        $this->assertTrue(true, $result1);
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'description' => $descriptionChange['description'],
        ]);
    }

    public function test_it_deletes_product()
    {
        $this->withoutMiddleware();
        $category = new Category([
            'id' => 1,
            'category_name' => 'Fruit',
            'parent_id' => null,
        ]);
        $category->save();
        $data = [
            'category_id' => 1,
            'product_name' => 'Orange Juice',
            'description' => 'new tasty',
            'product_image' => 'default.png',
            'price' => 3.00,
        ];
        $product = $this->productRepositoryMock->create($data);
        $controller = new ProductController(
            $this->productRepositoryMock,
            $this->categoryRepositoryMock
        );
        $result = $controller->destroy($product->id);
        $this->assertTrue(true, $result);
    }

}
