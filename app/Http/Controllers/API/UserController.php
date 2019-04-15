<?php

<<<<<<< HEAD
namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //


    /**
     * returns the details of a user.
     *
     * @param App\User user
     * @return \Illuminate\Http\Response
     */

     public function fetchUser(User $user){
        return response()->json($user, 200, []);
     }


=======
namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
	 * Get single user record
	 * 
	 * @param string  $id
	 * @return array
     */
    public function getSingleUser($id)
    {
    	$user = User::where('uid', $id)->with('therapist')->first();
    	return new UserResource($user); 
    }
>>>>>>> upstream/server
}
