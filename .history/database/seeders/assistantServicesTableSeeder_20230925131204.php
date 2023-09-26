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
            'service_start_time'=>setTime(22, 32, 5)->toDateTimeString(),

            'service_end_time'=>setTime(23, 32, 5)->toDateTimeString(),
            'service_id'=>1,
            'description'=>'lorem ipsum',
            'isDelete'=>0,
        ]);
    }
}
