<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->string("description");
            $table->string("url");
            $table->string("imageUrl");
            $table->string("name");
            
            $table->string("userId");
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string("categoryId");
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}