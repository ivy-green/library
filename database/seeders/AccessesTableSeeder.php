<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

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
            'created_at' => Carbon::now()
                                ->subDays(rand(2,20))
                                ->format('Y-m-d H:i:s'),
        ],
        [
            "tenquyen" => "Thủ thư",
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
        ],
        [
            "tenquyen" => "Độc giả",
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
        ],
       ];
       DB::table('accesses')->insert($data);
    }
}
