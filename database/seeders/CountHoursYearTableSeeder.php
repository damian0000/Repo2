<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CountHoursYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('counthoursyears')->insert([
            'assistant_id'=>1,
            'patient_id'=>4,
            'hours'=>60,
            'month'=>1,
            'year'=>2023,
            'project_id'=>1,
            'is_delete'=>0
        ]);
        DB::table('counthoursyears')->insert([
            'assistant_id'=>2,
            'patient_id'=>5,
            'hours'=>60,
            'month'=>1,
            'year'=>2023,
            'project_id'=>1,
            'is_delete'=>0
        ]);
        DB::table('counthoursyears')->insert([
            'assistant_id'=>3,
            'patient_id'=>4,
            'hours'=>60,
            'month'=>1,
            'year'=>2023,
            'project_id'=>2,
            'is_delete'=>0
        ]);


    }
}
