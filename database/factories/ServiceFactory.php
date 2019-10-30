<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Service;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'wifi' => $faker -> boolean (50),
        'parking' => $faker -> boolean (50),
        'pool' => $faker -> boolean (50),
        'reception' => $faker -> boolean (50),
        'sauna' => $faker -> boolean (50),
        'seaview' => $faker -> boolean (50)
    ];
});
