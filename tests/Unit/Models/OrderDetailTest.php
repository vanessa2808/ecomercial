<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderDetailTest extends TestCase
{
    use RefreshDatabase;
    protected $comment;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function order_details_database_has_expected_columns()
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

    public function test_contains_valid_fillable_properties()
    {
        $order_details = new OrderDetail();
        $this->assertEquals([
            'product_id',
            'order_id',
            'quantity',
        ], $order_details->getFillable());
    }

    public function a_order_detail_belongs_to_order()
    {
        $order_detail = new OrderDetail();
        $order_id = $order_detail->user();
        $this->assertBelongsToRelation($order_id, $order_detail, new OrderDetail());
    }

    public function a_order_details_belongs_to_product()
    {
        $order_detail = new OrderDetail();
        $product_id = $order_detail->user();
        $this->assertBelongsToRelation($product_id, $order_detail, new OrderDetail());
    }

}
