<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reports = [
            [
                'full_name' => 'Василий Сергеев',
                'event_form' => 'вебинары',
                'event_level' => 'областной',
                // Y-m-d
                'event_date' => '2021.08.22',
                'event_full_name' => 'WSR 2021 подготовка участников',
                'event_hours' => '5',
                'event_document' => 'Да',
                'event_who' => 'Центр подготовки к чемпионату WSR Сибирь',
                'event_number' => '82349 - 5833',
            ],

        ];

        Report::insert($reports);
    }
}