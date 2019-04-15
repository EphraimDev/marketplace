<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'=>$faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'role'=>'therapist',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\therapist::class, function (Faker $faker) {
    return [
       'age'=>rand(18,60),
       'rating'=>rand(0,5),
       'fee_per_hour'=>rand(10000,20000),
       'years_of_experience'=>rand(2,10),
       'availability'=>true,
       'user_id'=>App\User::all()->random()->id,
       'name_of_practice'=>$faker->word,
       'profile_photo_link'=>$faker->url,
       'phone'=>$faker->phoneNumber,
       'address_1'=>$faker->address,
       'city'=>$faker->city,
       'state'=>$faker->state,
       'country'=>$faker->country,
       'title'=>$faker->title,
       'personal_pronouns'=>'he',
       'therapist_type'=>'back',
       'type_of_license'=>'LPC',
       'licensed_in'=>$faker->country,
       'personal_statement'=>$faker->paragraph,
       'practice_website'=>$faker->url,
    ];
});

