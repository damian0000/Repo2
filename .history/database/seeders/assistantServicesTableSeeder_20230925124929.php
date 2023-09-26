<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class assistantServicesTableSeeder extends Seeder
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
            'service_date'=>2023-09-24,
            'service_start_time'=>19:30:00,
            'service_end_time'=>20:30:00,
            'service_id'=>1,
            'description'=>'lorem ipsum',
            'isDelete'=>0,
        ]);
        DB::table('assistant_services')->insert([
            'user_id'=>3,
            'patient_id'=>5,
            'service_date'=>2023-09-24,
            'service_start_time'=>15:30:00,
            'service_end_time'=>27:30:00,
            'service_id'=>1,
            'description'=>'lorem ipsum',
            'isDelete'=>0,
        ]);
    }
}
