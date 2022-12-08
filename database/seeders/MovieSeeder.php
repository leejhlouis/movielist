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
            'title' => 'Avengers: Endgame',
            'description' => "Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.",
            'director' => 'Anthony Russo, Joe Russo',
            'release_date' => '2019-04-26',
            'thumbnail' => 'movie003-thumbnail.jpeg',
            'background' => 'movie003-background.jpeg',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'title' => 'Doctor Strange',
            'description' => "Dr. Stephen Strange's (Benedict Cumberbatch) life changes after a car accident robs him of the use of his hands. When traditional medicine fails him, he looks for healing, and hope, in a mysterious enclave. He quickly learns that the enclave is at the front line of a battle against unseen dark forces bent on destroying reality. Before long, Strange is forced to choose between his life of fortune and status or leave it all behind to defend the world as the most powerful sorcerer in existence.",
            'director' => 'Scott Derrickson',
            'release_date' => '2016-10-26',
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
