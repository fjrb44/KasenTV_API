<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoVideoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_video_lists', function (Blueprint $table) {
            $table->integer("videoListId");
            $table->foreign('videoListId')->references('id')->on('video_lists')->onUpdate("cascade")->onDelete("cascade");

            $table->integer("videoId");
            $table->foreign('videoId')->references('id')->on('videos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_video_lists');
    }
}
