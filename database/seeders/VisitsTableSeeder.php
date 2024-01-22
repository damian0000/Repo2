<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;


class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->insert([
            'travel_time'=>60,
            'date_visit'=>Carbon::create('2023', '01', '01'),
            'start_time_visit'=>Carbon::createFromFormat('H:i', '16:00')->toDateTimeString(),
            'end_time_visit'=>Carbon::createFromFormat('H:i', '17:30')->toDateTimeString(),
            'time_visit'=>Carbon::createFromFormat('H:i', '01:30')->toDateTimeString(),
            'description_visit'=>'',
            'additional_notes'=>'lorem ipsum',
            'is_delete'=>0
        ]);
        DB::table('visits')->insert([
            'travel_time'=>60,
            'date_visit'=>Carbon::create('2023', '09', '01'),
            'start_time_visit'=>Carbon::createFromFormat('H:i', '16:00')->toDateTimeString(),
            'end_time_visit'=>Carbon::createFromFormat('H:i', '17:30')->toDateTimeString(),
            'time_visit'=>Carbon::createFromFormat('H:i', '01:30')->toDateTimeString(),
            'description_visit'=>'',
            'additional_notes'=>'lorem ipsum',
            'is_delete'=>0
        ]);

    }
}