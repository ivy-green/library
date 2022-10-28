<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ],
            [
                'noidung'=> 'Mỗi độc giả không vi phạm tối đa 5 quy định. Nếu vi phạm sẽ bị khóa thẻ.',
            ],
            [
                'noidung'=> 'Mỗi ngày trả trễ, phạt 1.000 đồng / ngày',
            ],
            [
                'noidung'=> 'Tuổi của độc giả từ 18 đến 55 tuổi mới được làm thẻ thư viện. Thẻ có giá trị trong 6 tháng',
            ],
            [
                'noidung'=> 'Thư viện chỉ nhận các sách xuất bản trong vòng 8 năm',
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
