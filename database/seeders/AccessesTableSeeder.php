<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessesTableSeeder extends Seeder
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
            "tenquyen" => "Quản trị viên",
        ],
        [
            "tenquyen" => "Thủ thư",
        ],
        [
            "tenquyen" => "Độc giả",
        ],
       ];
       DB::table('accesses')->insert($data);
    }
}
