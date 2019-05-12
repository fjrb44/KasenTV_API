<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentions', function (Blueprint $table) {
            //$table->bigIncrements('id');
            //$table->timestamps();
            
            $table->integer("userId");
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer("videoId");
            $table->foreign('videoId')->references('id')->on('videos')->onDelete('cascade')->onUpdate('cascade');

            $table->integer("comentId");
            $table->foreign('comentId')->references('id')->on('coments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentions');
    }
}
