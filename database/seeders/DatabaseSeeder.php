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
        $this->call(CompaniesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolesUsersTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(CountHoursYearTableSeeder::class);
        $this->call(VisitsTableSeeder::class);
        $this->call(VisitUsersTableSeeder::class);
        $this->call(ProjectUsersTableSeeder::class);





    }
}
