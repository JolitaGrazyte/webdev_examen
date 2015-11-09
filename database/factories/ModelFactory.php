<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Illuminate\Support\Facades\Hash;

$factory->define(App\User::class, function (Faker\Generator $faker) {

    $name = explode(' ', $faker->name);

//    $users = [];

//    dd($faker->unique()->ipv4);

    $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2015-11-'.rand(1, 9).' '.rand(0, 12).':00:00');

    $user =  [
        'username'      => $faker->name,
        'first_name'    => $name[0],
        'last_name'     => $name[1],
        'email'         => $faker->email,
        'password'      => Hash::make('testing'),
        'remember_token' => str_random(10),
        'role'          => 1,
        'ip'            => $faker->unique()->ipv4,
//       'ip'            => inet_pton($faker->unique()->ipv4)
        'created_at'    =>  $date,
        'updated_at'    =>  $date
    ];

    return $user;

});


$factory->define(App\Votes::class, function (Faker\Generator $faker) {
    return [
        'image_id'  => rand(1, 15),
        'ip'        => $faker->unique()->ipv4

    ];
});


