<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserControllerTest extends TestCase
{   
    use DatabaseMigrations;

    public function test_that_an_authorised_user_can_get_all_user()
    {
        //Authenticate and create country
       // $token = $this->authenticate();

        $user = factory('App\User')->create();

        //call route and assert response
        $response = $this->json(
            'GET',
            'api/v1/users'
        );

        $response->assertStatus(200);

        $this->assertCount(1, $response->json()['data']);
        $this->assertEquals($response->json()['status'],'success');
    }

    public function test_that_an_authorised_user_can_get_a_user_detail()
    {
        //Authenticate and create country
       // $token = $this->authenticate();

       $user = factory('App\User')->create();

       //call route and assert response
       $response = $this->json(
           'GET',
           'api/v1/users/'.$user->id
       );

       $response->assertStatus(200);
       
       $this->assertEquals(
            $user->email,
            $response->json()['data']['email']
        );
    }
}