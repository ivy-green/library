<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'thaomy',
                'email' => 'thaomy@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'thaomy2',
                'email' => 'mythao@gmail.com',
                'password' => bcrypt('12345678'),
            ]
        ];
        DB::table('users')->insert($data);
    }
}
