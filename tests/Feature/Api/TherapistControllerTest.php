<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TherapistControllerTest extends TestCase
{   
    use DatabaseMigrations;

    public function test_that_an_authorised_user_can_get_all_therapist()
    {
        //Authenticate and create country
       // $token = $this->authenticate();

       $therapist = factory('App\User')->create(['role'=>'therapist']);

        //call route and assert response
        $response = $this->json(
            'GET',
            'api/v1/therapists'
        );
        
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [[ array_keys($therapist->toArray()) ]]
        );
    }

    public function test_that_an_authorised_user_can_get_a_therapist_detail()
    {
        //Authenticate and create country
       // $token = $this->authenticate();

       $therapist = factory('App\Therapist')->create();

       $response = $this->json(
           'GET',
           'api/v1/therapists/'.$therapist->id
       );

       $response->assertStatus(200);

       $this->assertEquals(
            $therapist->title,
            $response->json()[0]['title']
        );
    }
}