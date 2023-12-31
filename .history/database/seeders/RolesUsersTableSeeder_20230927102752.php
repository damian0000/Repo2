<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
class RolesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_users')->insert([
            'role_id'=>1,
            'user_id'=>1
        ]);

        DB::table('roles_users')->insert([
            'role_id'=>1,
            'user_id'=>2
        ]);

        DB::table('roles_users')->insert([
            'role_id'=>2,
            'user_id'=>2
        ]);

        DB::table('roles_users')->insert([
            'role_id'=>3,
            'user_id'=>2
        ]);

        DB::table('roles_users')->insert([
            'role_id'=>4,
            'user_id'=>3
        ]);

        DB::table('roles_users')->insert([
            'role_id'=>5,
            'user_id'=>3
        ]);
    }
}