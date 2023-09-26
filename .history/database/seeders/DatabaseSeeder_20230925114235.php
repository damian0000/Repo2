<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleUsersTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(UsersTableSeeder::class);


    }
}
