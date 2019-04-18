<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Therapist;
use App\Appointment;


class AppointmentController extends Controller
{
    //

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
