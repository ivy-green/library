<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'ngaynhap' => '2002-09-02',
                'trigia' => '100000',
                'matheloai' => 1
            ],
            [
                'tensach'=> 'Mot Ngay Code Ma Khong Co Bug',
                'ngaynhap' => '2022-010-02',
                'trigia' => '120000',
                'matheloai' => 3
            ],
            [
                'tensach'=> 'Cuoi Di Bug Se Tu Fix',
                'ngaynhap' => '2020-10-22',
                'trigia' => '120000',
                'matheloai' => 3
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
