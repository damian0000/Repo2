<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;
class AssistantServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assistant_services')->insert([
            'user_id'=>2,
            'patient_id'=>4,
            'patient_id_from_where'=>5,
            'tavel_time'=>60,
            'service_date'=>Carbon::create('2023', '01', '01'),
            'service_start_time'=>Carbon::createFromFormat('H:i', '16:00')->toDateTimeString(),

            'service_end_time'=>Carbon::createFromFormat('H:i', '17:30')->toDateTimeString(),
            'service_id'=>1,
            'description'=>'lorem ipsum',
            'isDelete'=>0
        ]);

        DB::table('assistant_services')->insert([
            'user_id'=>3,
            'patient_id'=>5,
            'patient_id_from_where'=>4,
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
