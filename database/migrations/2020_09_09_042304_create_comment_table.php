<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('comment')) {
            Schema::create('comment', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
                $table->text('comment');
                $table->integer('rate');
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
        Schema::dropIfExists('comment');
    }
}
