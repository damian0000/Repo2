<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert({
            'name'=>'Damian',
            'email'=>"damian.matoga@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Matoga",
            'pesel'=>'95091207111',
            'phone'=>'999-555-666',
            'street'=>'Ks. Wujka 16a/12',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'isActiv'=>1,
            'role'=>1
        });
    }
}