<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW UserView AS
            SELECT 
                users.id, users.username,  users.logo, users.banner,
                count(*) as followers
            FROM users
            INNER JOIN suscribes ON users.id = suscribes.influencerId
            GROUP BY users.id"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS UserView");
    }
}
