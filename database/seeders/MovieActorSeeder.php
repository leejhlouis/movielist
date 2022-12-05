<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_actors')->insert([[
            'movie_id' => 1,
            'actor_id' => 1,
            'character_name' => 'Peter Parker'
        ]]);
    }
}
