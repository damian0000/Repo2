<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name'=>'Asystent osobisty',
            'description'=>'Asystent osobisty osoby niepełnosprawnej',
            'company_id'=>1,
            'is_delete'=>0
        ]);
        DB::table('projects')->insert([
            'name'=>'Opieka wytchnieniowa',
            'company_id'=>1,
            'is_delete'=>0
        ]);
    }
}
