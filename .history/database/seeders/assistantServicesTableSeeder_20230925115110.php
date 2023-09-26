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
            'user_id'=>,
            'patient_id',
            'patient_id_from_where',
            'tavel_time',
            'service_date',
            'service_start_time',
            'service_end_time',
            'service_id',
            'isDelete',
            'created_at',
            'updated_at'
        ]);
    }
}
