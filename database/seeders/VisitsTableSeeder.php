<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;
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
            'assistant_id'=>2,
            'patient_id'=>4,
            'from_patient_id'=>5,
            'travel_time'=>60,
            'date_visit'=>Carbon::create('2023', '01', '01'),
            'start_time_visit'=>Carbon::createFromFormat('H:i', '16:00')->toDateTimeString(),

            'end_time_visit'=>Carbon::createFromFormat('H:i', '17:30')->toDateTimeString(),
            'description_visit'=>'',
            'additional_notes'=>'lorem ipsum',
            'isDelete'=>0
        ]);

        DB::table('visits')->insert([
            'assistant_id'=>3,
            'patient_id'=>5,
            'date_visit'=>Carbon::create('2023', '09', '01'),
            'start_time_visit'=>Carbon::createFromFormat('H:i', '11:00')->toDateTimeString(),

            'end_time_visit'=>Carbon::createFromFormat('H:i', '12:00')->toDateTimeString(),
            'description_visit'=>'',
            'additional_notes'=>'lorem ipsum',
            'isDelete'=>0
        ]);

    }
}
