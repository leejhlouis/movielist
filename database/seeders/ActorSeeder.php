<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'biography' => 'Thomas Stanley Holland is an English actor. His accolades include a British Academy Film Award, three Saturn Awards, a Guinness World Record and an appearance on the Forbes 30 Under 30 Europe list. Some publications have called Holland one of the most popular actors of his generation.',
            'dob' => '1996-06-01',
            'place_of_birth' => 'Kingston upon Thames, United Kingdom',
            'image_url' => 'actor001.jpg',
            'popularity' => 1000,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'name' => 'Benedict Cumberbatch',
            'gender' => 'Male',
            'biography' => 'Benedict Timothy Carlton Cumberbatch CBE is an English actor. Known for his work on screen and stage, Cumberbatch has received various accolades, including a British Academy Television Award, a Primetime Emmy Award and a Laurence Olivier Award.',
            'dob' => '1976-07-19',
            'place_of_birth' => 'London, United Kingdom',
            'image_url' => 'actor002.jpg',
            'popularity' => 1500,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'name' => 'Zendaya',
            'gender' => 'Female',
            'biography' => 'Zendaya Maree Stoermer Coleman is an American actress and singer. She has received various accolades, including two Primetime Emmy Awards. Time magazine named her one of the 100 most influential people in the world on its annual list in 2022.',
            'dob' => '1996-09-01',
            'place_of_birth' => 'Oakland, California, United States',
            'image_url' => 'actor003.jpg',
            'popularity' => 1400,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'name' => 'Letitia Wright',
            'gender' => 'Female',
            'biography' => 'Letitia Michelle Wright is a Guyanese-British actress. She began her career with guest roles in the television series Top Boy, Coming Up, Chasing Shadows, Humans, Doctor Who, and Black Mirror. For the latter, she received a Primetime Emmy Award nomination.',
            'dob' => '1993-10-31',
            'place_of_birth' => 'Georgetown, Guyana',
            'image_url' => 'actor004.jpg',
            'popularity' => 800,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'name' => 'Choi Woo-shik',
            'gender' => 'Male',
            'biography' => 'Choi Woo-shik is a South Korean-Canadian actor based in South Korea. He first gained widespread recognition for his leading role in the film Set Me Free.',
            'dob' => '1990-03-26',
            'place_of_birth' => 'Seoul, South Korea',
            'image_url' => 'actor005.jpg',
            'popularity' => 750,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        ]);
    }
}
