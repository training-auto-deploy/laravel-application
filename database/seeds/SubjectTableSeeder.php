<?php

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            1 => "Toán",
            2 => "Ngữ Văn",
            3 => "Tiếng Anh",
            4 => "Vật Lý",
            5 => "Sinh Học",
            6 => "Hóa Học",
            7 => "Lịch Sử",
            8 => "Địa Lý",
        ];
        
        foreach ($datas as $data) {
            Subject::create([
                'name' => $data,
            ]);
        }
    }
}
