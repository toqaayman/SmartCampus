<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NfcTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('nfc')->insert([
                'student_id' => $faker->unique()->numberBetween(10000, 99999),
                'activity_mood' => $faker->randomElement(['active', 'inactive']),
            ]);
        }
    }
}
