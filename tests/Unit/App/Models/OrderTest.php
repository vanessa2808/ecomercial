<?php

namespace Tests\Unit\App\Models;

use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    protected $order;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function orders_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('orders', [
                'id',
                'user_id',
                'total_price',
                'status',
            ]),
            1
        );
    }

    public function test_contains_valid_fillable_properties()
    {
        $order = new Order();
        $this->assertEquals([
            'user_id',
            'total_price',
            'status',
        ], $order->getFillable());
    }

    public function a_order_belongs_to_user()
    {
        $order = new Order();
        $user_id = $order->user();
        $this->assertBelongsToRelation($user_id, $order, new Order());
    }

    public function a_user_has_many_order_details()
    {
        $user = new User();
        $comment = $user->comments();
        $this->assertHasManyRelation($comment, $user, new Comment());
    }

    protected function setUp(): void {
        parent::setUp();

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
        $order = new Order([
            'id' => 1,
            'user_id' => $user->id,
            'total_price' => 100.000,
            'status' => 0,
        ]);
        $order->save();
        $this->assertEquals($user->id, $order->user_id);
        $orders = User::find(1)->orders()->get();
        $this->assertCount(1, $orders);
    }

}
