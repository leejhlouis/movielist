<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'username' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt("admin"),
            'dob' => '1970-01-01',
            'phone' => '+62 852-9283-2733',
            'is_admin' => 1,
            'img_url' => 'user001.jpg',
            'date_joined' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'username' => 'Louis',
            'email' => 'louisgustavo07@gmail.com',
            'password' => bcrypt("2107"),
            'dob' => '1970-02-02',
            'phone' => '+62 895-8482-6846',
            'is_admin' => 0,
            'img_url' => 'user002.jpg',
            'date_joined' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'username' => 'Marcello',
            'email' => 'marcelloyoel10@gmail.com',
            'password' => bcrypt("123"),
            'dob' => '1970-03-03',
            'phone' => '+62 812-6846-8482',
            'is_admin' => 0,
            'img_url' => 'user002.jpg',
            'date_joined' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]
        ]);
    }
}
