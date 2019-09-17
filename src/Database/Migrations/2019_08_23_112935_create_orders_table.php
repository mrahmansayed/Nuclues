<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('country');
            $table->integer('postal_code');
            $table->string('city');
            $table->string('state');
            $table->boolean('approved')->default(0);
            $table->string('payment_type');
            $table->boolean('payment_status')->default(0);
            $table->string('delivery_status')->nullable();
            $table->string('amount')->default(0);
            $table->string('currency_type');
            $table->timestamps();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            
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
