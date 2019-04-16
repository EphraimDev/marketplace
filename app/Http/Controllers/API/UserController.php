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

    /**
     * returns the details of a user.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */

    public function fetchProfile(Request $request,$id){
        $user = User::whereId($id)->first();
        $user['own'] = false;
        if($request->user()->id == $user->id){
            $user['own'] = true;
        }

        return response()->json($user, 200, []);
    }
}
