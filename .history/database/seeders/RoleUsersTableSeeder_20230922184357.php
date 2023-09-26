<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_role')->insert([
            'name'=>'Administrator'
        ]);
        DB::table('user_role')->insert([
            'name'=>'Asystent'
        ]);
        DB::table('users')->insert([
            'name'=>'Pacjent'
        ]);
    }
}
