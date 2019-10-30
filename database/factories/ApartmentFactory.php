<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Apartment;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
      'title' => $faker -> sentence(6),
      'desc' => $faker -> text(300),
      'rooms' =>  rand(1, 4),
      'beds' => rand(1, 8),
      'toilettes' =>  rand(1,2),
      'square_meters' => $faker -> numberBetween(35, 150),
      'address' => $faker -> address,
      'lat' => $faker -> latitude($min = -90, $max = 90),
      'long' => $faker -> longitude($min = -180, $max = 180)
    ];
});
