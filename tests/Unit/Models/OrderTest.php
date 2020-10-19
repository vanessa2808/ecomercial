<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class OrderTest extends TestCase
{
    protected $order;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->order = new Order();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->order);
    }

    public function test_table_name()
    {
        $this->assertEquals('orders', $this->order->getTable());
    }

    public function orders_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('order_details', [
                'id',
                'user_id',
                'total_price',
                'status',
            ]),
            1
        );
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'user_id',
            'total_price',
            'status',
        ], $this->order->getFillable());
    }

    public function test_key_name()
    {
        $this->assertEquals('id', $this->order->getKeyName());
    }

    public function test_user_relation()
    {
        $this->belongsTo_relation_test(
            User::class,
            'user_id',
            'id',
            $this->order->user()
        );
    }

    public function test_orderDetails_relation()
    {
        $this->hasMany_relation_test(
            OrderDetail::class,
            'order_id',
            $this->order->order_details()
        );
    }

}
