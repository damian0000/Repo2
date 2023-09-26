<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Administrator'
        ]);
        DB::table('users')->insert([
            'name'=>'Asystent'
        ]);
    }
}