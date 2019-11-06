<?php

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/classes.json');
        $datas = json_decode($json);

        foreach ($datas as $data) {
            \App\Models\Classes::create([
                'name' => $data->name,
                'link_call' => $data->link_call,
                'student_id' => $data->student_id,
                'teacher_id' => $data->teacher_id,
                'description' => $data->description,
                'start_time' => $data->start_time,
                'end_time' => $data->end_time,
                'status' => $data->status,
            ]);
        }
    }
}

