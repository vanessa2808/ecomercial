<?php

namespace Tests\Unit\Jobs;

use App\Jobs\SendAcceptEmailToUser;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Mockery as m;
use Illuminate\Support\Facades\Session;

class SendAcceptEmailToUserTest extends TestCase
{
    use RefreshDatabase;

    protected $orderRepositotyMock;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function setUp(): void
    {
        $this->afterApplicationCreated(function () {
            $this->orderRepositotyMock = m::mock($this->app->make(OrderRepositoryInterface::class));
        });

        parent::setUp();
    }

    public function tearDown(): void
    {
        unset($this->orderRepositotyMock);
        m::close();
        parent::tearDown();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_send_mail_order_accept()
    {
        Queue::fake();
        $user = new User([
            'user_name' => 'Nguyen Thi Hong Yen',
            'role_id' => config('const.role.user'),
            'phone' => '12222',
            'email' => 'yen@gmail.com',
            'address' => 'Quang Nam',
            'password' => '12341234',
            'provider' => null,
            'provider_id' => null,
        ]);
        $user->save();
        $data = [
            'user_id' => $user->id,
            'total_price' => 13.00,
            'status' => 1,
        ];
        $order= $this->orderRepositotyMock->create($data);

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $orderedProducts = session('cart');
        $total =$cart->totalPrice;
        SendAcceptEmailToUser::dispatch($order->user->email, $orderedProducts, $total);

        Queue::assertPushed(SendAcceptEmailToUser::class);
    }
}
