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
            'name'=>'Fundacja Więccej z życia'
        ]);
        DB::table('companies')->insert([
            'name'=>'Fundacja Akme'
        ]);

    }
}
