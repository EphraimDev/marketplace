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
        'role'=>'ordinary_user',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Therapist::class, function (Faker $faker) {
    return [
       
       'rating'=>rand(0,5),
       'fee_per_hour'=>rand(10000,20000),
       'years_of_experience'=>rand(2,10),
       'availability'=>true,
       //'user_id'=>App\User::all()->random()->id,
       'user_id'=>function(){
           return factory('App\User')->create(['role'=>'therapist'])->id;
       },
       'verified'=>$faker->boolean,
       'name_of_practice'=>$faker->word,
      
     
       'city'=>$faker->city,
       'state'=>$faker->state,
       'country'=>$faker->country,
       'title'=>$faker->title,
    
   
       'type_of_license'=>'LPC',
     
       'personal_statement'=>$faker->paragraph,
       'practice_website'=>$faker->url,
    ];
});

