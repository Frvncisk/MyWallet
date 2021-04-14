<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transfer;
use Faker\Generator as Faker;

$factory->define(Transfer::class, function (Faker $faker) {
    return [
        'description' => $faker->text($maxNbChars=200),
        'monto'=>$faker->numberBetween($min=1500, $max=5000),
        'wallet_id' =>$faker->randomDigitNotNull
    ];
});
