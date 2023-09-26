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
            'tavel_time'=>60,
            'service_date'=>Carbon::create('2023', '01', '01'),
            'service_start_time'=>Carbon::createFromFormat('H:i', '16:00')->toDateTimeString(),

            'service_end_time'=>Carbon::createFromFormat('H:i', '17:30')->toDateTimeString(),
            'service_id'=>1,
            'description'=>'lorem ipsum',
            'isDelete'=>0
        ]);

        DB::table('visits')->insert([
            'assistant_id'=>3,
            'patient_id'=>5,
            'from_patient_id '=>4,
            'tavel_time'=>60,
            'service_date'=>Carbon::create('2023', '09', '01'),
            'service_start_time'=>Carbon::createFromFormat('H:i', '11:00')->toDateTimeString(),

            'service_end_time'=>Carbon::createFromFormat('H:i', '12:00')->toDateTimeString(),
            'service_id'=>1,
            'description'=>'lorem ipsum',
            'isDelete'=>0
        ]);

    }
}
