<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Therapist;
use App\Appointment;

class SuperAdminController extends Controller
{
    //
	public function index()
	{
		$allUsers=User::where('role','ordinary_user')->get();

		$allTherapists=User::where('role','therapist')->get();

		$allAppointment=Appointment::all();

		$recentlyAddedUsers=User::where('role','ordinary_user')->limit(5)->orderBY('id',"ASC")->get();

		$recentlyConcludedAppointments=Appointment::where('status','accepted')->get();

		return view('superadminBE.index',compact('allUsers','allTherapists','recentlyAddedUsers','allAppointment','recentlyConcludedAppointments'));


	}
    public function allUsers()
    {
    	$users=User::where('role','ordinary_user')->paginate();

    	return view('superadminBE.all_users',compact('users'));
    }


     public function allTherapists()
    {
    	$therapists=Therapist::all();

    	return view('superadminBE.all_therapist',compact('therapists'));
    }

    public function deleteUser($id)
    {
    	//id comes from the user table

    	$user=User::findOrFail($id);
    	$user->delete();

    	return back()->with(['suucess'=>'deleted']);
    }

    public function getAppointments($query=null)
    {	
    	if($query != null)
    	{


    	$appointments=Appointment::where('status',$query)->get();

    	}

    	else{
    		$appointments=Appointment::all();
    	}

    	return view('superadminBE.appointment',compact('appointments','query'));
    }





}
