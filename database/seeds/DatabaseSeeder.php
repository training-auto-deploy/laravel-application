<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            StudentTableSeeder::class,
            TeachersTableSeeder::class,
            ClassTableSeeder::class,
        ]);
    
         $this->call(SubjectTableSeeder::class);
         $this->call(GradesTablesSeeder::class);
         $this->call(TeacherSubjectTableSeeder::class);
    }
}
