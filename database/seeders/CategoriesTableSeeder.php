<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
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
                'tentheloai'=> 'Văn học',
                'mota' => 'Gồm các tác phẩm văn học được các nhà thi hào
                 sáng tác trong những năm đất nước chống giậc.',
                'soluongsach' => 4,
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
            [
                'tentheloai'=> 'Hành động',
                'mota' => 'Phù hợp với các bạn từ lứa tổi 16 đam mê với sự ly kỳ, kịch tính của những
                 pha hành động từ viễn tưởng đến đời thường qua cảm nhận của các nhà văn',
                'soluongsach' => 1,
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
            [
                'tentheloai'=> 'Tản văn',
                'mota' => 'Những lời văn chân thực, giản dị nhưng sâu sắc của những nhà văn mới nổi về cuỗ sống đời thường và
                 những kinh nghiệm trải qua trong cuộc sống, đặ biệt là trong chuyện tình cảm.',
                'soluongsach' => 0,
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
            [
                'tentheloai'=> 'Tài liệu',
                'mota' => 'Tài liệu chuyên ngành dành cho các bạn nghiên cứu về các lĩnh vực trong cuộc sống, chuyên môn của mình.',
                'soluongsach' => 2,
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
        ];
        
        DB::table('categories')->insert($data);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
