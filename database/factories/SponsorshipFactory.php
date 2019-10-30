<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Sponsorship;

$factory->define(Sponsorship::class, function (Faker $faker) {
    $types = ['2,99', '5,99', '9,99'];
    return [
        'price' => $faker -> randomElement($types),
        'time_period' => rand(24, 144),
        'start' => $faker -> dateTime
    ];});