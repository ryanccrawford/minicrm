<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use APP\CompanyUser;

class CompaniesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        //
        $faker = new Faker();
        for ($i = 0; $i < 20; $i++) {
            DB::table('companies_users')->insert([
                'company_id' => $i,
                'user_id' => 2,
                'can_access' => true,
            ]);
        }
    }
}
