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
            'password' => bcrypt("admin1"),
            'dob' => '1970-01-01',
            'phone' => '085292832733',
            'is_admin' => 1,
            'date_joined' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'username' => 'Louis',
            'email' => 'louisgustavo07@gmail.com',
            'password' => bcrypt("210702"),
            'dob' => '1970-02-02',
            'phone' => '089584826846',
            'is_admin' => 0,
            'date_joined' => Carbon::now()->setTimezone('Asia/Jakarta')
        ],
        [
            'username' => 'Marcello',
            'email' => 'marcelloyoel10@gmail.com',
            'password' => bcrypt("123456"),
            'dob' => '1970-03-03',
            'phone' => '081268468482',
            'is_admin' => 0,
            'date_joined' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]
        ]);
    }
}
