<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_tags', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->timestamps();

            $table->integer("videoId");
            $table->foreign('videoId')->references('id')->on('videos')->onDelete('cascade')->onUpdate('cascade');

            $table->integer("tagId");
            $table->foreign('tagId')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_tags');
    }
}
