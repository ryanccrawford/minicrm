<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Employee;
use Faker\Generator as Faker;
use App\User;

/*
|--------------------------------------------------------------------------
| Employee Factory
|--------------------------------------------------------------------------
| This function uses Faker to generate random Employee data to
| seed the database.
*/

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company_id' => $faker->numberBetween(1, 20),
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'user_id' => 2
    ];
});
