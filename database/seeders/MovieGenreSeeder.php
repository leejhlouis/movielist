<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_genres')->insert([[
            'movie_id' => 1,
            'genre_id' => 1,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'movie_id' => 1,
            'genre_id' => 2,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]
        ]);
    }
}
