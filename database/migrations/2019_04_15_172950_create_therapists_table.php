<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTherapistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fee_per_hour');
            $table->string('rating')->nullable()->default('0');
            $table->integer('age');
            $table->integer('years_of_experience');
            $table->boolean('availability');
            $table->string('name_of_practice');
            $table->string('practice_website');
            $table->string('phone');
            $table->string('address_1');
            $table->string('address_2')->nullable()->default('');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('title')->nullable()->default('');
            $table->string('personal_pronouns');
            $table->string('therapist_type');
            $table->string('type_of_license');
            $table->string('licensed_in');
            $table->string('undergraduate_institution')->nullable()->default('');
            $table->string('postgraduate_institution')->nullable()->default('');
            $table->longText('personal_statement');
            $table->string('profile_photo_link')->nullable()->default('');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('therapists');
    }
}
