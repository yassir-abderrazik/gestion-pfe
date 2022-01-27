<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Form;
use Faker\Generator as Faker;

$factory->define(Form::class, function (Faker $faker) {
    return [
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'CIN' => $faker->unique()->lexify('????'),
        'CNE' => $faker->unique()->lexify('????'),
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'city' => $faker->city,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->lexify('????'),
        'address' => $faker->address,
        'faculty' => $faker->word,
        'specialty' => $faker->word,
        'supervisor' => $faker->word,
        'project' => $faker->word,
        'summary' => $faker->text,
        
    ];
});