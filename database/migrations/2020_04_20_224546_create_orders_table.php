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
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            $table->dateTime('purchase_date')->default(now());
            $table->unsignedSmallInteger('order_status_id');
            $table->unsignedSmallInteger('delivery_method_id');
            $table->string('name');
            $table->string('tel');
            $table->string('email');
            $table->text('address');
            $table->text('note')->nullable();
            $table->text('admin_note')->nullable();
            $table->json('products');
            $table->float('subtotal');
            $table->float('tax');
            $table->float('total');
            $table->dateTime('paid_date')->nullable();
            $table->text('paid_detail')->nullable();
            $table->timestamps();
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
