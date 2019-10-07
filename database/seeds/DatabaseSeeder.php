<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the database.
     *
     * @return void
     */
    public function run()
    {
        //The seeds the entire database with sample data. Calls all the seeders in the proper order
        $this->call([
            UsersTableSeeder::class,
            CompaniesTableSeeder::class,
            EmployeesTableSeeder::class,
            CompaniesUsersTableSeeder::class,
        ]);
    }
}
