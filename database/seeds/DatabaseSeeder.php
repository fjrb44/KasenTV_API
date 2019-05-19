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

        DB::table('users')->insert([
            'username' => "Fran",
            'email' => "fran.rios@gmail.com",
            'google_data' => "nada",
            "languageId" => "1"
        ]);

        DB::table('users')->insert([
            'username' => "Pepe",
            'email' => "pepe.poncio@gmail.com",
            'google_data' => "nada",
            "languageId" => "1"
        ]);

        DB::table('users')->insert([
            'username' => "Paco",
            'email' => "paco.morcilla@gmail.com",
            'google_data' => "nada",
            "languageId" => "1"
        ]);

        $videoTitles = [ 
            "Video test 0", "Video test 10", "Video test 20", "Video test 30", "Video test 40",
            "Video test 1", "Video test 11", "Video test 21", "Video test 31", "Video test 41", 
            "Video test 2", "Video test 12", "Video test 22", "Video test 32", "Video test 42",
            "Video test 3", "Video test 13", "Video test 23", "Video test 33", "Video test 43", 
            "Video test 4", "Video test 14", "Video test 24", "Video test 34", "Video test 44",
            "Video test 5", "Video test 15", "Video test 25", "Video test 35", "Video test 45",
            "Video test 6", "Video test 16", "Video test 26", "Video test 36", "Video test 46",
            "Video test 7", "Video test 17", "Video test 27", "Video test 37", "Video test 47",
            "Video test 8", "Video test 18", "Video test 28", "Video test 38", "Video test 48",
            "Video test 9", "Video test 19", "Video test 29", "Video test 39", "Video test 49"
        ];
        $userId = 1;

        foreach( $videoTitles as $title){
            DB::table("videos")->insert([
                "description" => "Some dummy text in ".$title,
                "url" => "http://techslides.com/demos/sample-videos/small.mp4",
                "imageUrl" => "http://placehold.it/500x250",
                "title" => $title,
                "userId" => $userId
            ]);

            if( $userId == 3 ) $userId = 1;
            else $userId++;
            
        }
        
        DB::table('suscribes')->insert([
            "suscriberId" => 1,
            "influencerId" => 3
        ]);

        DB::table('suscribes')->insert([
            "suscriberId" => 3,
            "influencerId" => 1
        ]);
        DB::table('suscribes')->insert([
            "suscriberId" => 3,
            "influencerId" => 2
        ]);
    }
}
