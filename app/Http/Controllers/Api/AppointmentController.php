<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;
Use App\User;
class AppointmentController extends Controller
{
    /**
     * Ordinary user can book appointment with therapist
     * 
     * @param int  $userId
     * @return array
     */
    public function book(Request $request,$userId,$therapistId)
    {
    	// Tip:	$userId should come from the users table
 
        $user=User::find($userId);
         $therapist=User::find($therapistId);
        $appointment=Appointment::create([
            "user_id"=>$user->id,
            "therapist_id"=>$therapist->id,
            "reason_for_visit"=>$request->reason_for_visit,
            "previous_therapy"=>$request->previous_therapy,
            "status"=>"pending",
            "payment_mode"=>$request->payment_mode,
            "appointment_date"=>$request->appointment_date,
            "appointment_start_time"=>$request->appointment_start_time,
            "appointment_end_time"=>$request->appointment_end_time

        ]);

        if($appointment)
        {
            return response()->json(["data"=>$appointment,"status"=>"pending"]);
        }

    }

    /**
     * Ordinary user should be able to view all his/her booked appointments
     * 
     * @param int  $userId
     * @return array
     */
    public function userAppointments($userId)
    {
    	// Tip:	$userId should come from the users table
        $user= User::find($userId);
        $appointment=Appointment::where('user_id',$user->id)->get();
        return response()->json(['appointment'=>$appointment]);
    }

    /**
     * Start therapy session
     * 
     * @param int  $appointmentId
     * @param int  $userId
     * @return array
     */
    public function startSession($appointmentId, $userId)
    {
		// Tip:	1. $userId should come from the users table
		// 		2. appointmentId should come from appointments table

        $appointment=Appointment::findOrFail($appointmentId);
       
        $appointment->update(["status"=>"started"]);
     
        return response()->json(['data'=>$appointment,"status"=>"started"]);
    }

    /**
     * End therapy session
     * 
     * @param int  $appointmentId
     * @param int  $userId
     * @return array
     */
    public function endSession($appointmentId, $userId)
    {
    	// Tip:	1. $userId should come from the users table
		// 		2. appointmentId should come from appointments table
     $appointment=Appointment::findOrFail($appointmentId);
       
        $appointment->update(["status"=>"ended"]);

        return response()->json(['data'=>$appointment,"status"=>"ended"]);
    }

    /**
     * Therapist can view all his/her appointments with clients
     * 
     * @param int  $therapistId
     * @return array
     */
    public function therapistAppointments($therapistId)
    {
    	// Tip:	1. $therapistId should come from the users table

          $appointment=Appointment::where('id',$therapistId)->get();
        
        return response()->json(['appointment'=>$appointment]);
    }

    /**
     * Therapist can view only one of his/her appointment with a client
     * 
     * @param int  $appointmentId
     * @param int  $therapistId
     * @return array
     */
    public function singleAppointment($appointmentId, $therapistId)
    {
    	// Tip:	1. $therapistId should come from the users table
		// 		2. appointmentId should come from appointments table

          $appointment=Appointment::where([["therapist_id","=",$therapistId],['id',"=",$appointmentId]])->first();
        
        return response()->json(['appointment'=>$appointment]);

    }

    /**
     * Therapist can reject his/her appointment with a client
     * 
     * @param int  $appointmentId
     * @param int  $therapistId
     * @return array
     */
    public function rejectAppointment($appointmentId, $therapistId)
    {
    	// Tip:	1. $therapistId should come from the users table
		// 		2. appointmentId should come from appointments table

            $appointment=Appointment::findOrFail($appointmentId);
       
        $appointment->update(["status"=>"rejected"]);

        return response()->json(['data'=>$appointment,"status"=>"rejected"]);
    }

    /**
     * Therapist can accept his/her appointment with a client
     * 
     * @param int  $appointmentId
     * @param int  $therapistId
     * @return array
     */
    public function acceptAppointment($appointmentId, $therapistId)
    {
    	// Tip:	1. $therapistId should come from the users table
		// 		2. appointmentId should come from appointments table

              $appointment=Appointment::findOrFail($appointmentId);
       
        $appointment->update(["status"=>"accepted"]);

        return response()->json(['data'=>$appointment,"status"=>"accepted"]);


    }
    
}
