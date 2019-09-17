<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->string('title');
            $table->string('subtitle');
            $table->text('description')->nullable();
            $table->string('image');
            $table->string('price');
            $table->string('discount')->nullable();
            $table->string('del_price')->nullable();
            $table->string('product_type')->nullable();
            $table->string('vendor')->nullable();
            $table->string('quantity')->default(0);
            $table->text('information')->nullable();
            $table->boolean('like')->default(0);
            $table->integer('sell_count')->default(0);
            $table->timestamps();
            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');
            $table->foreign('subcategory_id')
                  ->references('id')->on('subcategories')
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
        Schema::dropIfExists('products');
    }
}
