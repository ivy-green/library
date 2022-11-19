<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            // [
            //     'ten' => 'docgia',
            //     'email' => 'docgia@gmail.com',
            //     'gioitinh' => 1,
            //     'ngaysinh' => '2002-07-31',
            //     'dienthoai' => '0777338809',
            //     'diachi' => '123 QL22 Hoc Mon',
            //     'password' => bcrypt('12345678'),
            //     'maquyen' => 3,
            //     'created_at' => Carbon::now()
            //                     ->subDays(rand(2,20))
            //                     ->format('Y-m-d H:i:s'),

            // ],
            [
                'ten' => 'docgia1',
                'email' => 'docgia1@gmail.com',
                'gioitinh' => 0,
                'ngaysinh' => '1999-07-31',
                'dienthoai' => '0777338809',
                'diachi' => '123 QL22 Hoc Mon',
                'password' => bcrypt('12345678'),
                'maquyen' => 3,
                'created_at' => Carbon::now()
                                ->subDays(rand(2,20))
                                ->format('Y-m-d H:i:s'),

            ],
            [
                'ten' => 'docgia2',
                'email' => 'docgia2@gmail.com',
                'gioitinh' => 1,
                'ngaysinh' => '1997-07-31',
                'dienthoai' => '0777338809',
                'diachi' => '123 QL22 Hoc Mon',
                'password' => bcrypt('12345678'),
                'maquyen' => 3,
                'created_at' => Carbon::now()
                                ->subDays(rand(2,20))
                                ->format('Y-m-d H:i:s'),

            ],
            [
                'ten' => 'docgia3',
                'email' => 'docgia3@gmail.com',
                'gioitinh' => 1,
                'ngaysinh' => '2000-07-31',
                'dienthoai' => '0777338809',
                'diachi' => '123 QL22 Hoc Mon',
                'password' => bcrypt('12345678'),
                'maquyen' => 3,
                'created_at' => Carbon::now()
                                ->subDays(rand(2,20))
                                ->format('Y-m-d H:i:s'),

            ],
            [
                'ten' => 'docgia4',
                'email' => 'docgia4@gmail.com',
                'gioitinh' => 0,
                'ngaysinh' => '2001-07-31',
                'dienthoai' => '0777338809',
                'diachi' => '123 QL22 Hoc Mon',
                'password' => bcrypt('12345678'),
                'maquyen' => 3,
                'created_at' => Carbon::now()
                                ->subDays(rand(2,20))
                                ->format('Y-m-d H:i:s'),

            ],
            [
                'ten' => 'docgia5',
                'email' => 'docgia5@gmail.com',
                'gioitinh' => 1,
                'ngaysinh' => '2004-07-31',
                'dienthoai' => '0777338809',
                'diachi' => '123 QL22 Hoc Mon',
                'password' => bcrypt('12345678'),
                'maquyen' => 3,
                'created_at' => Carbon::now()
                                ->subDays(rand(2,20))
                                ->format('Y-m-d H:i:s'),

            ],
            [
                'ten' => 'docgia6',
                'email' => 'docgia6@gmail.com',
                'gioitinh' => 0,
                'ngaysinh' => '1999-07-31',
                'dienthoai' => '0777338809',
                'diachi' => '123 QL22 Hoc Mon',
                'password' => bcrypt('12345678'),
                'maquyen' => 3,
                'created_at' => Carbon::now()
                                ->subDays(rand(2,20))
                                ->format('Y-m-d H:i:s'),

            ],
            // [
            //     'ten' => 'thuthu',
            //     'email' => 'thuthu@gmail.com',
            //     'gioitinh' => 1,
            //     'ngaysinh' => '2002-08-14',
            //     'dienthoai' => '0891129922',
            //     'diachi' => '3 QL20 Long An',
            //     'password' => bcrypt('12345678'),
            //     'maquyen' => 2,
            //     'created_at' => Carbon::now()
            //                         ->subDays(rand(2,20))
            //                         ->format('Y-m-d H:i:s'),
            // ],
            // [
            //     'ten' => 'admin',
            //     'email' => 'admin@gmail.com',
            //     'gioitinh' => 0,
            //     'ngaysinh' => '2003-12-06',
            //     'dienthoai' => '0891129922',
            //     'diachi' => '3 Tan An Long An',
            //     'password' => bcrypt('12345678'),
            //     'maquyen' => 1,
            //     'created_at' => Carbon::now()
            //                         ->subDays(rand(2,20))
            //                         ->format('Y-m-d H:i:s'),
            // ],
        ];
        DB::table('users')->insert($data);
    }
}
