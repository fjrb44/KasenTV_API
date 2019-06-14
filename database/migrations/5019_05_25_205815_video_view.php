<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VideoView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW VideoView AS
                SELECT 
                    videos.*, count(watches.videoId) as visualizations, 
                    users.username,  users.logo as userLogo
                FROM videos
                LEFT JOIN watches ON videos.id = watches.videoId
                INNER JOIN users ON videos.userId = users.id
                GROUP BY videos.id"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS VideoView");
    }
}
