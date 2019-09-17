<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
              $table->bigIncrements('id');
            $table->string('session_id');
            $table->unsignedBigInteger('product_id');
            $table->string('title');
            $table->string('qty');
            $table->string('price');
            $table->string('image');
            $table->string('total')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->timestamps();
            $table->foreign('product_id')
                  ->references('id')->on('products')
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
        Schema::dropIfExists('carts');
    }
}
