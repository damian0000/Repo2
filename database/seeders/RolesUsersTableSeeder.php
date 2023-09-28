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
        DB::table('roleUsers')->insert([
            'role_id'=>1,
            'user_id'=>1
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>2,
            'user_id'=>1
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>2,
            'user_id'=>2
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>2,
            'user_id'=>3
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>4
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>5
        ]);
    }
}