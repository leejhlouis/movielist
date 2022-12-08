<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'name' => 'Action',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'name' => 'Adventure',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'name' => 'Sci-fi',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'name' => 'Drama',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'name' => 'Romance',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'name' => 'Thriller',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'name' => 'Horror',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        ]);
    }
}
