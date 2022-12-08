<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'character_name' => 'Peter Parker/Spider-Man',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'movie_id' => 1,
            'actor_id' => 2,
            'character_name' => 'Dr. Stephen Strange',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'movie_id' => 1,
            'actor_id' => 3,
            'character_name' => 'Michelle "MJ" Jones',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'movie_id' => 2,
            'actor_id' => 4,
            'character_name' => 'Shuri',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'movie_id' => 3,
            'actor_id' => 1,
            'character_name' => 'Peter Parker/Spider-Man',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'movie_id' => 3,
            'actor_id' => 2,
            'character_name' => 'Dr. Stephen Strange',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'movie_id' => 3,
            'actor_id' => 4,
            'character_name' => 'Shuri',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'movie_id' => 4,
            'actor_id' => 2,
            'character_name' => 'Dr. Stephen Strange',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'movie_id' => 5,
            'actor_id' => 5,
            'character_name' => 'Kim Ki-woo',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        ]);
    }
}
