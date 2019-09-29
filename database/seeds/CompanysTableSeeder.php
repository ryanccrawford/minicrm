<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Use Factory to seed company data
        factory(Company::class, 20)->create();
    }
}
