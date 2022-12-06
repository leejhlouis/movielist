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
        ],
        [
            'title' => 'Black Panther: Wakanda Forever',
            'description' => "Queen Ramonda, Shuri, M'Baku, Okoye and the Dora Milaje fight to protect their nation from intervening world powers in the wake of King T'Challa's death. As the Wakandans strive to embrace their next chapter, the heroes must band together with Nakia and Everett Ross to forge a new path for their beloved kingdom.",
            'director' => 'Ryan Coogler',
            'release_date' => '2022-11-11',
            'thumbnail' => 'movie002-thumbnail.jpeg',
            'background' => 'movie002-background.jpeg',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'title' => 'The Avengers',
            'description' => "When Thor's evil brother, Loki (Tom Hiddleston), gains access to the unlimited power of the energy cube called the Tesseract, Nick Fury (Samuel L. Jackson), director of S.H.I.E.L.D., initiates a superhero recruitment effort to defeat the unprecedented threat to Earth. Joining Fury's \"dream team\" are Iron Man (Robert Downey Jr.), Captain America (Chris Evans), the Hulk (Mark Ruffalo), Thor (Chris Hemsworth), the Black Widow (Scarlett Johansson) and Hawkeye (Jeremy Renner).",
            'director' => 'Joss Whedon',
            'release_date' => '2012-05-04',
            'thumbnail' => 'movie003-thumbnail.jpeg',
            'background' => 'movie003-background.jpeg',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'title' => 'Joker',
            'description' => "Forever alone in a crowd, failed comedian Arthur Fleck seeks connection as he walks the streets of Gotham City. Arthur wears two masks -- the one he paints for his day job as a clown, and the guise he projects in a futile attempt to feel like he's part of the world around him. Isolated, bullied and disregarded by society, Fleck begins a slow descent into madness as he transforms into the criminal mastermind known as the Joker.",
            'director' => 'Todd Phillips',
            'release_date' => '2019-10-04',
            'thumbnail' => 'movie004-thumbnail.jpeg',
            'background' => 'movie004-background.jpeg',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'title' => 'Parasite',
            'description' => "Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.",
            'director' => 'Bong Joon-ho',
            'release_date' => '2019-10-05',
            'thumbnail' => 'movie005-thumbnail.jpeg',
            'background' => 'movie005-background.jpeg',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        ]);
    }
}
