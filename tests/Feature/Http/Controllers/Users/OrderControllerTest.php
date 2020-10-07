<?php

namespace Tests\Feature\Http\Controllers\Users;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery as m;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;
    protected $orderRepositoryMock;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function setUp(): void
    {
        $this->afterApplicationCreated(function () {
            $this->orderRepositoryMock = m::mock($this->app->make(OrderRepositoryInterface::class));
        });

        parent::setUp();
    }

    public function test_it_stores_new_product()
    {
        $user = new User([
            'id' => 1,
            'user_name' => 'Rion',
            'role_id' => '1',
            'phone' => 0374222,
            'email' => 'yenrion2@gmail.com',
            'address' => 'Da Nang',
            'password' => '12341234',
        ]);
        $user->save();
        $data = [
            'user_id' => $user->id,
            'total_price' => '3.9',
            'status' => '1',
        ];
        $order = $this->orderRepositoryMock->create($data);

        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'user_id' => $order->user_id,
            'total_price' => $order->total_price,
            'status' => $order->status,
        ]);
    }

}
