<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Therapist;
use App\Appointment;



class UserController extends Controller
{
    //


    public function allUsers()
    {
    	$users=User::where('role','ordinary_user')->paginate();

    	return view('superadminBE.all_users',compact('users'));
    }


    
    public function deleteUser($id)
    {
    	//id comes from the user table

    	$user=User::findOrFail($id);
    	$user->delete();

    	return back()->with(['suucess'=>'deleted']);
    }

}
