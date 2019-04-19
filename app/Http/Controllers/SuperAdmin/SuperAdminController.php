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
		$allUsers=User::where('role','ordinary-user')->get();

		$allTherapists=User::where('role','therapist')->get();

		$allAppointment=Appointment::all();

		$recentlyAddedUsers=User::where('role','ordinary-user')->limit(5)->orderBY('id',"ASC")->get();

		$recentlyConcludedAppointments=Appointment::where('status','accepted')->get();

		return view('superadminBE.index',compact('allUsers','allTherapists','recentlyAddedUsers','allAppointment','recentlyConcludedAppointments'));


	}




   




}
