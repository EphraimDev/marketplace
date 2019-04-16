<?php

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
}
