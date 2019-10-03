<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\User;
use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Company Factory
|--------------------------------------------------------------------------
| This function uses Faker to generate random Company data to
| seed the database.
*/

$factory->define(Company::class, function (Faker $faker) {

    $filepath = storage_path('images');

    if (!File::exists($filepath)) {
        File::makeDirectory($filepath);
    }

    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'website' => $faker->url,
        'logo' => $faker->image($filepath, 100, 100, null, false),
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
