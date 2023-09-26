<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'Administrator'
        ]);
        DB::table('roles')->insert([
            'name'=>'Asystent'
        ]);
        DB::table('roles')->insert([
            'name'=>'Pacjent'
        ]);
    }
}
