<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AssistantPatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assistantpatients')->insert([
            'assistant_id'=>2,
            'patient_id'=>4,
            'project_id'=>1,
            'is_delete'=>0
        ]);
        DB::table('assistantpatients')->insert([
            'assistant_id'=>2,
            'patient_id'=>5,
            'project_id'=>1,
            'is_delete'=>0
        ]);
        
        DB::table('assistantpatients')->insert([
            'assistant_id'=>2,
            'patient_id'=>6,
            'project_id'=>1,
            'is_delete'=>0
        ]);
        DB::table('assistantpatients')->insert([
            'assistant_id'=>3,
            'patient_id'=>6,
            'project_id'=>1,
            'is_delete'=>0
        ]);
        DB::table('assistantpatients')->insert([
            'assistant_id'=>3,
            'patient_id'=>8,
            'project_id'=>1,
            'is_delete'=>0
        ]);
        
        DB::table('assistantpatients')->insert([
            'assistant_id'=>7,
            'patient_id'=>9,
            'project_id'=>1,
            'is_delete'=>0
        ]);
    }
}
