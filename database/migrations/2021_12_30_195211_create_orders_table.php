<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_no')->unique();
            $table->unsignedBigInteger('user_id');
            $table->float('shipping_charge');
            $table->float('total_amount');
            $table->integer('status')->comment('0-Pending; 1-Approved; 2-Dispatched; 3-Delivered; 4-Not Delivered;5-Completed; 6- Cancelled')->default(0);
            $table->timestamp('order_date')->useCurrent();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
