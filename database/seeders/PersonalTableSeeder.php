<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class PersonalTableSeeder extends Seeder
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
            "name" => "thao my",
            "tuoi" => 2,
            'created_at' => Carbon::now()
                                ->subDays(rand(2,20))
                                ->format('Y-m-d H:i:s'),
        ],
       ];
       DB::table('personals')->insert($data);
    }
}
