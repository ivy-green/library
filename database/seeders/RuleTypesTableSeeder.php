<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class RuleTypesTableSeeder extends Seeder
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
                'tenloai'=> 'Sách',
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
            [
                'tenloai'=> 'Độc Giả',
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
            [
                'tenloai'=> 'Mượn Trả Sách',
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
            [
                'tenloai'=> 'Thủ thư',
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
        ];
        
        DB::table('rule_types')->insert($data);
    }
}
