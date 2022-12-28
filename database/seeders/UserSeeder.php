<?php

namespace Database\Seeders;

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
            'is_admin' => '1'
        ],
        [
            'username' => 'Louis',
            'email' => 'louisgustavo07@gmail.com',
            'password' => bcrypt("2107"),
            'is_admin' => '0'
        ],
        [
            'username' => 'Marcello',
            'email' => 'marcelloyoel10@gmail.com',
            'password' => bcrypt("123"),
            'is_admin' => '0'
        ]
        ]);
    }
}
