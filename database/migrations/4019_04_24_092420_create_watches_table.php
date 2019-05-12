<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watches', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->timestamps();

            $table->integer("userId");
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer("videoId");
            $table->foreign('videoId')->references('id')->on('videos')->onDelete('cascade')->onUpdate('cascade');

            $table->integer("time");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watches');
    }
}