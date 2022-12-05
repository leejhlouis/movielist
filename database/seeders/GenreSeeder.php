<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([[
            'name' => 'Action'
        ],
        [
            'name' => 'Comedy'
        ],
        [
            'name' => 'Drama'
        ],
        [
            'name' => 'Romance'
        ],
        [
            'name' => 'Thriller'
        ],
        [
            'name' => 'Horror'
        ],
        ]);
    }
}
