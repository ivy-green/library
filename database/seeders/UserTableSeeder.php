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
                'ten' => 'docgia',
                'email' => 'docgia@gmail.com',
                'gioitinh' => 1,
                'ngaysinh' => '2002-07-31',
                'dienthoai' => '0777338809',
                'diachi' => '123 QL22 Hoc Mon',
                'password' => bcrypt('12345678'),
                'maquyen' => 3,

            ],
            [
                'ten' => 'thuthu',
                'email' => 'thuthu@gmail.com',
                'gioitinh' => 1,
                'ngaysinh' => '2002-08-14',
                'dienthoai' => '0891129922',
                'diachi' => '3 QL20 Long An',
                'password' => bcrypt('12345678'),
                'maquyen' => 2,

            ],
            [
                'ten' => 'admin',
                'email' => 'admin@gmail.com',
                'gioitinh' => 0,
                'ngaysinh' => '2003-12-06',
                'dienthoai' => '0891129922',
                'diachi' => '3 Tan An Long An',
                'password' => bcrypt('12345678'),
                'maquyen' => 1,

            ],
        ];
        DB::table('users')->insert($data);
    }
}
