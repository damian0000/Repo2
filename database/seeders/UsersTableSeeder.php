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
        //1
        DB::table('users')->insert([
            'name'=>'Damian',
            'email'=>"damian.matoga@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Matoga",
            'pesel'=>'95091207111',
            'phone'=>'999555666',
            'street'=>'Ks. Wujka 16a/12',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'company_id'=>1,
            'is_delete'=>0
        ]);

        //asystent
        //2
        DB::table('users')->insert([
            'name'=>'Hanna',
            'email'=>'hanna.zurowska@wp.pl',
            'password'=>bcrypt('password'),
            'surname'=>"Żurowska",
            'pesel'=>'85091207811',
            'phone'=>'239555666',
            'street'=>'Bartodziejska 63',
            'post_code'=>'62-100',
            'city'=>'Skoki',
            'company_id'=>1
        ]);

        //3
        DB::table('users')->insert([
            'name'=>'Ireneusz',
            'email'=>"irek.kowalski@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Kowalski",
            'pesel'=>'95065207111',
            'phone'=>'999555666',
            'street'=>'Kościuszki 16',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'company_id'=>1
        ]);

        // patient
        //4
        DB::table('users')->insert([
            'name'=>'Maciej',
            'email'=>"maciej.bartkowiak@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Bartkowiak",
            'pesel'=>'95091207111',
            'disability'=>'Mózgowe porażenie dziecięce',
            'phone'=>'459745785',
            'street'=>'Kcyńska 8',
            'post_code'=>'62-100',
            'city'=>'Skoki',
            'status'=>'Aktywny',
            'company_id'=>1
        ]);

        //5
        DB::table('users')->insert([
            'name'=>'Arkadiusz',
            'email'=>"arkadiusz.bartkowiak@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Bartkowiak",
            'pesel'=>'95091285511',
            'disability'=>'Mózgowe porażenie dziecięce',
            'phone'=>'479745785',
            'street'=>'Kcyńska 8',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'status'=>'Aktywny',
            'company_id'=>1
        ]);


        //6
        DB::table('users')->insert([            
            'name'=>'Ferdynant',
            'email'=>"ferdynant.kowalski@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Kowalski",
            'pesel'=>'95091207111',
            'phone'=>'999555666',
            'street'=>'Kościuszki',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'company_id'=>1,
            'is_delete'=>0
        ]);

        //asystent
        //7
        DB::table('users')->insert([
            'name'=>'Halina',
            'email'=>'halina.zurowska@wp.pl',
            'password'=>bcrypt('password'),
            'surname'=>"Żurowska",
            'pesel'=>'85091207811',
            'phone'=>'239555666',
            'street'=>'Bartodziejska 33',
            'post_code'=>'62-100',
            'city'=>'Skoki',
            'company_id'=>1
        ]);

        //8
        DB::table('users')->insert([
            'name'=>'Piotr',
            'email'=>"piotr.kowal@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Kowal",
            'pesel'=>'95065207111',
            'phone'=>'999555666',
            'street'=>'Kościuszki 16',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'company_id'=>1
        ]);

        // patient
        //9
        DB::table('users')->insert([
            'name'=>'Marcel',
            'email'=>"marcel.pila@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Pila",
            'pesel'=>'95091207111',
            'disability'=>'Mózgowe porażenie dziecięce',
            'phone'=>'459745785',
            'street'=>'Kcyńska 8',
            'post_code'=>'62-100',
            'city'=>'Skoki',
            'status'=>'Aktywny',
            'company_id'=>1
        ]);

        //10
        DB::table('users')->insert([
            'name'=>'Krzysztof',
            'email'=>"krzysztof.wrona@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"wrona",
            'pesel'=>'95091285511',
            'disability'=>'Mózgowe porażenie dziecięce',
            'phone'=>'479745785',
            'street'=>'Kcyńska 8',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'status'=>'Aktywny',
            'company_id'=>1
        ]);

        //11
        DB::table('users')->insert([
            'name'=>'Tomasz',
            'email'=>"tomasz.rzasak@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Rząsa",
            'pesel'=>'95091285511',
            'disability'=>'Mózgowe porażenie dziecięce',
            'phone'=>'479745785',
            'street'=>'Kcyńska 48',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'status'=>'Aktywny',
            'company_id'=>1
        ]);


        //12
        DB::table('users')->insert([            
            'name'=>'Zygmunt',
            'email'=>"zygmunt.pilch@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Pilch",
            'pesel'=>'95091207111',
            'phone'=>'999555666',
            'street'=>'Kościuszki',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'company_id'=>1,
            'is_delete'=>0
        ]);

        //asystent
        //13
        DB::table('users')->insert([
            'name'=>'Danuta',
            'email'=>'danuta.zurek@wp.pl',
            'password'=>bcrypt('password'),
            'surname'=>"Żurek",
            'pesel'=>'85091207811',
            'phone'=>'239555666',
            'street'=>'Bartodziejska 33',
            'post_code'=>'62-100',
            'city'=>'Skoki',
            'company_id'=>1
        ]);

        //14
        DB::table('users')->insert([
            'name'=>'Leszek',
            'email'=>"leszek.kowal@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Kowal",
            'pesel'=>'95065207111',
            'phone'=>'999555666',
            'street'=>'Kościuszki 16',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'company_id'=>1
        ]);

        // patient
        //15
        DB::table('users')->insert([
            'name'=>'Mieczysław',
            'email'=>"mietek.nowak@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Nowak",
            'pesel'=>'95091207111',
            'disability'=>'Mózgowe porażenie dziecięce',
            'phone'=>'459745785',
            'street'=>'Kcyńska 8',
            'post_code'=>'62-100',
            'city'=>'Skoki',
            'status'=>'Aktywny',
            'company_id'=>1
        ]);

        //16
        DB::table('users')->insert([
            'name'=>'Kamil',
            'email'=>"kamil.wrona@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"wrona",
            'pesel'=>'95091285511',
            'disability'=>'Mózgowe porażenie dziecięce',
            'phone'=>'479745785',
            'street'=>'Kcyńska 8',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'status'=>'Aktywny',
            'company_id'=>1
        ]);

        //17
        DB::table('users')->insert([
            'name'=>'Stanisław',
            'email'=>"staszek.wrona@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"wrona",
            'pesel'=>'95091285511',
            'phone'=>'479745785',
            'street'=>'Kcyńska 8',
            'post_code'=>'62-100',
            'city'=>'Wągrowiec',
            'status'=>'Aktywny',
            'company_id'=>2
        ]);
    }
}
