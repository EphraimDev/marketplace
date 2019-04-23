<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

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

$factory->define(App\User::class, function (Faker $faker) {
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

$factory->define(App\Therapist::class, function (Faker $faker) {
    return [
       'rating'=>rand(0,5),
       'fee_per_hour'=>rand(10000,20000),
       'years_of_experience'=>rand(2,10),
       'city'=>$faker->city,
       'state'=>$faker->state,
       'country'=>$faker->country,
       'type_of_license'=>'LPC',
       'type_of_therapist'=>$faker->bs,
       'personal_statement'=>$faker->paragraph,
       'practice_website'=>$faker->url,
       'user_id'=>function(){
           return factory('App\User')->create(
               ['role'=>'therapist']
           )->id;
       }
    ];
});

$factory->define(App\Appointment::class, function (Faker $faker) {
    $firstTime = $faker->time;
    $secondTime = $faker->time;
    return [
        'user_id'=>function(){
            return factory('App\User')->create(
                ['role'=>'ordinary-user']
            )->id;
        },
        'therapist_id'=>function(){
            return factory('App\Therapist')->create()->id;
        },
        'reason_for_visit'=>$faker->bs,
        'previous_therapy'=>$faker->boolean,
        'status'=>'pending',
        'payment_mode'=>'paystack',
        'appointment_date'=>$faker->date,
        'appointment_start_time'=>$firstTime > $secondTime?$secondTime:$firstTime,
        'appointment_end_time'=>$firstTime > $secondTime?$firstTime:$secondTime,
    ];
});

$factory->define(App\Verifications::class, function (Faker $faker) {
    $file = UploadedFile::fake()->image('avatar.jpg');

    $identityCard = Storage::putFileAs(
        'verification', $file,'identity_card-'.$file->hashName()
    );

    $identityCard = Storage::url($identityCard);

    return[
        'therapist_id'=>function(){
            return factory('App\Therapist')->create()->id;
        },
        'document_link'=>$identityCard
    ];
});

$factory->state(App\Verifications::class, 'licenseImage', function ($faker) {
    $file = UploadedFile::fake()->image('avatar.jpg');

    $licenseImage = Storage::putFileAs(
        'verification', $file,'license_image-'.$file->hashName()
    );
    
    $licenseImage = Storage::url($licenseImage);

    return [
        'document_link' => $licenseImage
    ];
});