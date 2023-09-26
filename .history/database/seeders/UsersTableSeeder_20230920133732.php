<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
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
        ]);

        //asystent
        DB::table('users')->insert([
            'name'=>'Hanna',
            'email'=>'hanna.zurowska@wp.pl',
            'password'=>bcrypt('password'),
            'surname'=>"Żurowska",
            'pesel'=>'85091207811',
            'phone'=>'239-555-666',
            'street'=>'Bartodziejska 63',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'isActiv'=>1,
            'role'=>2
        ]);

        DB::table('users')->insert([
            'name'=>'Ireneusz',
            'email'=>"irek.kowalski@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Kowalski",
            'pesel'=>'95065207111',
            'phone'=>'999-555-666',
            'street'=>'Kościuszki 16',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'isActiv'=>1,
            'role'=>2
        ]);

        // patient
        DB::table('users')->insert([
            'name'=>'Maciej',
            'email'=>"maciej.bartkowiak@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Bartkowiak",
            'pesel'=>'95091207111',
            'disability'=>'Mózgowe porażenie dziecięce',
            'phone'=>'459-745-785',
            'street'=>'Kcyńska 8',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'isActiv'=>1,
            'role'=>1
        ]);
    }
}
