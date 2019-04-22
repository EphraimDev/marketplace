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
            $table->bigIncrements('id');
            $table->string('type_of_therapist')->nullable();
            $table->string('type_of_license')->nullable();
            $table->integer('years_of_experience');
            $table->integer('year_licensed')->nullable();
            $table->string('postgraduate_institute')->nullable();
            $table->string('name_of_practice')->nullable();
            $table->string('practice_website')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('personal_statement')->nullable();
            $table->string('fee_per_hour')->nullable();
            $table->string('rating')->nullable();
            $table->string('personal_pronouns')->nullable();
            $table->boolean('availability')->default(false);
            $table->boolean('verified')->default(false);
            $table->unsignedBigInteger('user_id');
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
