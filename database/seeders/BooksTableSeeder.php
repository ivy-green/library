<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class BooksTableSeeder extends Seeder
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
                'tensach'=> 'Moi Ngay Mot Niem Vui',
                'trigia' => '100000',
                'matheloai' => 1,
                'matacgia' => 1,
                'soluong' => 2,
                'anhbia' => 'default.png',
                'created_at' => '2002-09-06',
            ],
            [
                'tensach'=> 'Moi Ngay Mot Niem Buon',
                'trigia' => '30000',
                'matheloai' => 1,
                'matacgia' => 1,
                'soluong' => 2,
                'anhbia' => 'default.png',
                'created_at' => '2002-09-05',
            ],
            [
                'tensach'=> 'Cang Ngay Cang Buon',
                'trigia' => '123000',
                'matheloai' => 1,
                'matacgia' => 1,
                'soluong' => 2,
                'anhbia' => 'default.png',
                'created_at' => '2002-09-05',
            ],
            [
                'tensach'=> 'Mot Ngay Code Ma Khong Co Bug',
                'trigia' => '120040',
                'matheloai' => 3,
                'matacgia' => 1,
                'soluong' => 2,
                'anhbia' => 'default.png',
                'created_at' => '2022-10-06',
            ],
            [
                'tensach'=> 'Cuoi Di Bug Se Tu Fix',
                'trigia' => '120020',
                'matheloai' => 3,
                'matacgia' => 1,
                'soluong' => 2,
                'anhbia' => 'default.png',
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],

        ];
        
        DB::table('book')->insert($data);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
