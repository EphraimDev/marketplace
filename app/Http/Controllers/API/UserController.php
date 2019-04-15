<?php

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


}
