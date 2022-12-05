<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actors')->insert([[
            'name' => 'Tom Holland',
            'gender' => 'Male',
            'biography' => 'Thomas Stanley Holland is an English actor. His accolades include a British Academy Film Award, three Saturn Awards, a Guinness World Record and an appearance on the Forbes 30 Under 30 Europe list. Some publications have called him one of the most popular actors of his generation',
            'dob' => '2002-01-21',
            'place_of_birth' => 'California',
            'image_url' => 'th.jpeg',
            'popularity' => 1000
        ]
        ]);

    }
}
