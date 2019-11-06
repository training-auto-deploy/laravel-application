<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/teachers.json');
        $datas = json_decode($json);
        foreach ($datas as $data) {
            \App\Models\Teacher::create([
                'user_id' => $data->user_id,
                'is_active' => $data->is_active,
                'cv' => $data->cv,
                'money' => $data->money,
                'is_free' => $data->is_free,
                'star' => $data->star,
                'score' => $data->score,
                'taught' => $data->taught,
                'phone' => $data->phone,
                'description' => $data->description,
                'grade' => $data->grade,
                'salary' => $data->salary,
            ]);
        }
    }
}
