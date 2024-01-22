<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class VisitUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visitusers')->insert([
            'visit_id'=>1,
            'assistant_id'=>2,
            'patient_id'=>4,
            'from_patient_id'=>5,
            'is_delete'=>0
        ]);
        DB::table('visitusers')->insert([
            'visit_id'=>2,
            'assistant_id'=>3,
            'patient_id'=>5,
            'from_patient_id'=>4,
            'is_delete'=>0
        ]);
    }
}
