<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
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
            "tentacgia" => "Nguyen Ngoc Thao My",
            "ngaysinh" => "2002-07-31",
            "gioitinh" => 1,
            "soluongsach" => 0,
        ],
        [
            "tentacgia" => "Truong The Vinh",
            "ngaysinh" => "1999-1-31",
            "gioitinh" => 0,
            "soluongsach" => 0,
        ],
        [
            "tentacgia" => "Ngoc Minh",
            "ngaysinh" => "1882-04-21",
            "gioitinh" => 2,
            "soluongsach" => 0,
        ],
       ];
       DB::table('authors')->insert($data);
    }
}
