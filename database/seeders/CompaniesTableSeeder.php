<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name'=>'Fundacja Więcej z życia',
            'is_delete'=>0
        ]);
        DB::table('companies')->insert([
            'name'=>'Fundacja Akme',
            'is_delete'=>0
        ]);
        DB::table('companies')->insert([
            'name'=>'Stowarzyszenie Start Poznań',
            'is_delete'=>0
        ]);

        DB::table('companies')->insert([
            'name'=>'Fundacja Aktywni bez barier',
            'is_delete'=>0
        ]);
    }
}