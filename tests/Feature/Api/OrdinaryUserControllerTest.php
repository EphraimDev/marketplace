<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OrdinaryUserControllerTest extends TestCase
{   
    use DatabaseMigrations;

    public function test_that_an_authorised_user_can_get_all_ordinary_user()
    {
        //Authenticate and create country
       // $token = $this->authenticate();

        $ordinaryUser = factory('App\User')->create(['role'=>'ordinary_user']);
        $userTherapist = factory('App\User')->create(['role'=>'therapist']);

        //call route and assert response
        $response = $this->json(
            'GET',
            'api/v1/ordinary-users'
        );

        $response->assertStatus(200);

        //Assert the count is 1 and the name of the first country correlates
        $this->assertEquals(1,count($response->json()['users']));

        $this->assertEquals(
            $ordinaryUser->first_name,
            $response->json()['users'][0]['first_name']
        );
        $this->assertNotEquals(
            $userTherapist->first_name,
            $response->json()['users'][0]['first_name']
        );
    }

    public function test_that_an_authorised_user_can_get_an_ordinary_user()
    {
        //Authenticate and create country
       // $token = $this->authenticate();

       $ordinaryUser = factory('App\User')->create(['role'=>'ordinary_user']);

       //call route and assert response
       $response = $this->json(
           'GET',
           'api/v1/ordinary-users/'.$ordinaryUser->id
       );

       $response->assertStatus(200);

       $this->assertEquals(
            $ordinaryUser->first_name,
            $response->json()['users']['first_name']
        );
    }

    // public function test_that_an_authorised_user_can_update_an_ordinary_user()
    // {
    //     //Authenticate and create country
    //    // $token = $this->authenticate();

    //    $ordinaryUser = factory('App\User')->create(['role'=>'ordinary_user']);
    //    $makeOrdinaryUser = factory('App\User')->make(['role'=>'ordinary_user']);

    //    //call route and assert response
    //    $response = $this->json(
    //        'PUT',
    //        'api/v1/ordinary-users/'.$ordinaryUser->id,
    //         $makeOrdinaryUser->toArray()
    //    );

    //    $this->assertArrayHasKey('suuccess',$response->json());

    // }

    public function test_that_an_authorised_user_can_delete_an_ordinary_user()
    {
        //Authenticate and create country
       // $token = $this->authenticate();

       $ordinaryUser = factory('App\User')->create(['role'=>'ordinary_user']);

       $response = $this->json(
           'DELETE',
           'api/v1/ordinary-users/'.$ordinaryUser->id
       );
       
       $this->assertNull($ordinaryUser->fresh());

       $this->assertArrayHasKey('suuccess',$response->json());
    }
}