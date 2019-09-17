<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('blogcategories_id');
            $table->string('title');
            $table->string('slug');
            $table->string('image')->default('default.png');
            $table->text('description');
            $table->string('user')->nullable();
            $table->timestamps();
            $table->foreign('blogcategories_id')
                  ->references('id')->on('blogcategories')
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
        Schema::dropIfExists('blogs');
    }
}
