<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class RulesTableSeeder extends Seeder
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
                'noidung'=> 'Mỗi độc giả mượn tối đa 5 cuốn trong 4 ngày.',
                'maloai'=> '2',
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
            [
                'noidung'=> 'Mỗi độc giả không vi phạm tối đa 5 quy định. Nếu vi phạm sẽ bị khóa thẻ.',
                'maloai'=> '2',
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
            [
                'noidung'=> 'Mỗi ngày trả trễ, phạt 1.000 đồng / ngày',
                'maloai'=> '3',
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
            [
                'noidung'=> 'Tuổi của độc giả từ 18 đến 55 tuổi mới được làm thẻ thư viện. Thẻ có giá trị trong 6 tháng',
                'maloai'=> '2',
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
            [
                'noidung'=> 'Thư viện chỉ nhận các sách xuất bản trong vòng 8 năm',
                'maloai'=> '1',
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
            [
                'noidung'=> 'Thủ thư nhận đúng phí phạt theo quy định, không nhận nhiều hơn.',
                'maloai'=> '4',
                'created_at' => Carbon::now()
                                    ->subDays(rand(2,20))
                                    ->format('Y-m-d H:i:s'),
            ],
        ];
        
        DB::table('rules')->insert($data);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
