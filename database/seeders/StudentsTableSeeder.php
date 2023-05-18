<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Generate 10 students
        for ($i = 1; $i <= 10; $i++) {
            Student::create([
                'student_id' => 'S' . $i,
                'name' => 'Student ' . $i,
                'email' => 'student' . $i . '@example.com',
                'activity_mood' => 'mood' . $i,
            ]);
        }
    }
}
