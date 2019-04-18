<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthControllerTest extends TestCase
{   
    use DatabaseMigrations;

    public function test_that_an_authorised_user_can_login()
    {   
        //Create user
        $user = factory('App\User')->create([
            'email'=>'sample@email.com',
            'password'=>bcrypt('secret')
        ]);
        //attempt login
        $response = $this->json(
            'POST','api/v1/auth/login',
            ['email' => 'sample@email.com',
            'password' => 'secret']
        );
        //Assert it was successful and a token was received
        $response->assertStatus(200);
        $this->assertArrayHasKey('success',$response->json());
    } 

    public function test_that_an_unauthorised_user_can_not_login()
    {
        $response = $this->json(
            'POST','api/v1/auth/login',
            ['email' => 'sample@email.com',
            'password' => 'secret']
        );

        $response->assertStatus(401);
        $this->assertArrayHasKey('error',$response->json());
    }

    public function test_that_a_user_can_register()
    {
        //User's data
        $user = factory('App\User')->make();
        
        $userArray = $user->toArray()
            +['password'=>'secret','user_type'=>'therapist'];
        //Send post request
        $response = $this->json('POST','/api/v1/auth/register',$userArray);
        //Assert it was successful
        $response->assertStatus(200);
        //Assert we received a token
        $this->assertArrayHasKey('success',$response->json());
    }

    // public function test_that_an_authorised_user_can_view_user_detail()
    // {   
    //     $token = $this->authenticate();

    //     $response = $this->json(
    //         'GET',
    //         'api/v1/auth/user',
    //         [],['Authorization' => 'Bearer '. $token]
    //     );

    //     $response->assertStatus(200);

    //     $this->assertArrayHasKey('success',$response->json());
    // }

    // public function test_that_an_authorised_user_can_logout()
    // {
    //     $token = $this->authenticate();

    //     $response = $this->json(
    //         'POST',
    //         'api/v1/auth/logout',
    //         [],['Authorization' => 'Bearer '. $token]
    //     );

    //     $this->assertArrayHasKey('status',$response->json());
    // }
}
