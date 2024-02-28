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
            'user_id'=>1,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>1,
            'user_id'=>2,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>2,
            'user_id'=>2,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>2,
            'user_id'=>3,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>4,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>5,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>6,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>2,
            'user_id'=>7,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>8,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>9,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>10,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>2,
            'user_id'=>11,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>12,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>13,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>14,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>2,
            'user_id'=>15,
            'is_delete'=>0
        ]);

        DB::table('roleUsers')->insert([
            'role_id'=>3,
            'user_id'=>16,
            'is_delete'=>0
        ]);

        
        DB::table('roleUsers')->insert([
            'role_id'=>2,
            'user_id'=>17,
            'is_delete'=>0
        ]);
    }
}
