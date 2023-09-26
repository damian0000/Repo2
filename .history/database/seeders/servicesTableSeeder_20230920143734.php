<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name'=>'Mycie naczyń'
        ]);

        DB::table('services')->insert([
            'name'=>'Wyjście na spacer'
        ]);

        DB::table('services')->insert([
            'name'=>'Robienie posiłków'
        ]);
    }
}