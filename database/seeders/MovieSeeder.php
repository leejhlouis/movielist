<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([[
            'title' => 'Spider-Man: No Way Home',
            'description' => "With Spider-Man's identity now revealed, our friendly neighborhood web-slinger is unmasked and no longer able to separate his normal life as Peter Parker from the high stakes of being a superhero. When Peter asks for help from Doctor Strange, the stakes become even more dangerous, forcing him to discover what it truly means to be Spider-Man.",
            'director' => 'Jon Watts',
            'release_date' => '2021-12-17',
            'thumbnail' => 'movie001-thumbnail.jpeg',
            'background' => 'movie001-background.jpeg',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]]);
    }
}
