<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Ordinary user can book appointment with therapist
     * 
     * @param int  $userId
     * @return array
     */
    public function book($userId)
    {
    	// Tip:	$userId should come from the users table
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
    }
    
}
