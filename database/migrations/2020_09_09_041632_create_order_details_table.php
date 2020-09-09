<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('order_details')) {
            Schema::create('order_details', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
                $table->unsignedBigInteger('order_id');
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
                $table->integer('quantity');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
