<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;

class UserController extends Controller
{
    /**
     * Get all the users
     * 
     * @return array
     */
    public function index()
    {
        $users = User::all();
       
        return new UserResourceCollection($users); 
    }

    /**
	 * Get single user record
	 * 
	 * @param string  $id
	 * @return array
     */
    public function show($id)
    {
    	$user = User::where('id', $id)->first();
        
        if (!$user) {
            return response()->json(['error' => 'User not found!'], 404);
        }

    	return new UserResource($user); 
    }

    /**
     * Delete just one user
     * 
     * @param string  $id
     * @return array
     */
    public function destroy($id)
    {
        // 
    }

    /**
     * Update user
     * 
     * @param string  $id
     * @return array
     */
    public function update($id)
    {
        // 
    }
}
