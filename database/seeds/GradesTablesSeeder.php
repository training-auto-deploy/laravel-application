<?php

use Illuminate\Database\Seeder;
use App\Models\Grades;

class GradesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            1 => "Cấp 1",
            2 => "Cấp 2",
            3 => "Cấp 3",
        ];
        foreach ($datas as $data) {
            Grades::create([
                'name' => $data,
            ]);
        }
    }
}
