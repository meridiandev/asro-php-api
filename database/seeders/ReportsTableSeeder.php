<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // https://github.com/fzaninotto/Faker
        // только для теста! 500 записей в базу данных
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 500; $i++) {
            Report::create([
                'full_name' => $faker->name,
                'event_form' => $faker->text,
                'event_level' => $faker->text,
                'event_date' => $faker->date('Y-m-d', 'now'),
                'event_full_name' => $faker->text,
                'event_hours' => $faker->randomNumber(1),
                'event_document' => $faker->randomNumber(8),
                'event_who' => $faker->text,
                'event_number' => $faker->randomNumber(10)
            ]);
        }
    }
}
