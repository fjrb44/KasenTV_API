<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscribes', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->timestamps();

            $table->integer("suscriberId");
            $table->foreign('suscriberId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer("influencerId");
            $table->foreign('influencerId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suscribes');
    }
}
