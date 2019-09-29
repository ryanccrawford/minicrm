<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Company;
use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Company::class, function (Faker $faker) {

    $filepath = storage_path('images');

    if (!File::exists($filepath)) {
        File::makeDirectory($filepath);
    }

    return [
        'name' => $faker->company,
        'email' => $faker->unique()->companyEmail,
        'logo' => $faker->image($filepath, 100, 100, null, false),
        'website' => $faker->url, 
    ];

});
