<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $idiomas = [ "Español", "Ingles", "Frances" ];
        $idiomaCort = [ "esp", "eng", "fr" ];

        for($i = 0, $length = sizeof($idiomas); $i < $length; $i++){
            DB::table('languages')->insert([
                'name' => $idiomas[$i],
                'shortName' => $idiomaCort[$i]
            ]);
        }
    }
}
