<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class OrderDetailTest extends TestCase
{
    protected $orderDetail;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->orderDetail = new OrderDetail();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->orderDetail);
    }

    public function test_table_name()
    {
        $this->assertEquals('order_details', $this->orderDetail->getTable());
    }

    public function orderDetails_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('order_details', [
                'id',
                'product_id',
                'order_id',
                'quantity',
            ]),
            1
        );
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'product_id',
            'order_id',
            'quantity',
        ], $this->orderDetail->getFillable());
    }

    public function test_key_name()
    {
        $this->assertEquals('id', $this->orderDetail->getKeyName());
    }

    public function test_order_relation()
    {
        $this->belongsTo_relation_test(
            Order::class,
            'order_id',
            'id',
            $this->orderDetail->order()
        );
    }

    public function test_product_relation()
    {
        $this->belongsTo_relation_test(
            Product::class,
            'product_id',
            'id',
            $this->orderDetail->product()
        );
    }

}
