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
            'project_id'=>2,
            'user_id'=>1,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>2,
            'user_id'=>2,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>2,
            'user_id'=>3,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>1,
            'user_id'=>4,
            'is_delete'=>0
        ]);

        DB::table('projectusers')->insert([
            'project_id'=>2,
            'user_id'=>5,
            'is_delete'=>0
        ]);
    }
}
