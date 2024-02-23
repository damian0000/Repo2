<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ProjectUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>1,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>2,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>3,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>4,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>5,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>6,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>7,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>8,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>9,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>10,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>11,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>12,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>13,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>14,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>15,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>16,
            'is_delete'=>0
        ]);

    }
}
