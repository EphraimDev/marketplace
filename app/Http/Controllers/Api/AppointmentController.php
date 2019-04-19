<?php

namespace App\Http\Controllers\Api;

use DB;
Use App\User;
use Validator;
use App\Appointment;
use App\Therapist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Ordinary user can book appointment with therapist
     *
     * @param int  $therapistId
     * @param int  $userId
     * @return array
     */
    public function book(Request $request, $userId, $therapistId)
    {
        // Check if this action is performed by the logged in user
        if (Auth::user()->id != $userId) {
            return response()->json([
                'error' => ['code' => 403, 'message' => "Forbidden to update another user's details"]
            ], 403);
        }

        $userId = Auth::user()->id;

        $therapist = User::where('id', $therapistId)->where('role', 'therapist')->first('id');

        if (!$therapist) {
            return response()->json([
                'error' => ['code' => 404, 'message' => 'Therapist not found']
            ], 404);
        }

        $validate = Validator::make($request->all(), [
            'previous_therapy' => 'required',
            'appointment_date' => 'required|date|date_format:Y-m-d|after:yesterday',
            'appointment_start_time' => 'required|date_format:H:i:s',
            'appointment_end_time' => 'date_format:H:i:s|after:appointment_start_time'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => "Unprocessable Entity",
                    'errors' => $validate->errors()
                ]
            ], 422);
        } else {

            DB::beginTransaction();

            $appointment = Appointment::create([
                "user_id" => $userId,
                "therapist_id" => $therapist->id,
                "reason_for_visit" => $request->reason_for_visit,
                "previous_therapy" => $request->previous_therapy,
                "status" => "pending",
                "payment_mode" => $request->payment_mode,
                "appointment_date" => $request->appointment_date,
                "appointment_start_time" => $request->appointment_start_time,
                "appointment_end_time" => $request->appointment_end_time
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'OK',
                'data' => $appointment
            ], 200);
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
        // Check if this action is performed by the logged in user
        if (Auth::user()->id != $userId) {
            return response()->json([
                'error' => ['code' => 403, 'message' => "Forbidden to update another user's details"]
            ], 403);
        }

        $appointments = User::where('id', Auth::user()->id)
                                ->where('role', 'ordinary-user')
                                ->with(['userAppointments.therapist'])
                                ->first();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'OK',
            'data' => $appointments
        ], 200);
    }

    /**
     * User can view only one of his/her appointment with a therapist
     *
     * @param int  $appointmentId
     * @param int  $userId
     * @return array
     */
    public function userSingleAppointment($appointmentId, $userId)
    {
        // Check if this action is performed by the logged in user
        if (Auth::user()->id != $userId) {
          return response()->json([
              'error' => ['code' => 403, 'message' => "Forbidden to access another user's details"]
          ], 403);
        }

        $appointment = Appointment::where('user_id', $userId)
                                    ->where('id', $appointmentId)
                                    ->with('therapist')
                                    ->first();

        if (!$appointment) {
            return response()->json([
                'error' => ['code' => 404, 'message' => 'Appointment not found']
            ], 404);
        }

        return response()->json([
          'status' => 'success',
          'code' => 200,
          'message' => 'OK',
          'data' => $appointment
        ], 200);
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
        // Check if this action is performed by the logged in user
        if (Auth::user()->id != $userId) {
            return response()->json([
                'error' => ['code' => 403, 'message' => "Forbidden to update another user's details"]
            ], 403);
        }

        $appointment = Appointment::where('id', $appointmentId)
                                ->where('user_id', $userId)
                                ->with('therapist')
                                ->first();

        if (!$appointment) {
            return response()->json([
                'error' => ['code' => 404, 'message' => 'Appointment not found']
            ], 404);
        }

        DB::beginTransaction();
        $appointment->update(["status" => "started"]);
        DB::commit();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'OK',
            'data' => $appointment
        ], 200);
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
        // Check if this action is performed by the logged in user
        if (Auth::user()->id != $userId) {
            return response()->json([
                'error' => ['code' => 403, 'message' => "Forbidden to access another user's details"]
            ], 403);
        }

        $appointment = Appointment::where('id', $appointmentId)
                                ->where('user_id', $userId)
                                ->with('therapist')
                                ->first();

        if (!$appointment) {
            return response()->json([
                'error' => ['code' => 404, 'message' => 'Appointment not found']
            ], 404);
        }

        DB::beginTransaction();
        $appointment->update(["status" => "ended"]);
        DB::commit();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'OK',
            'data' => $appointment
        ], 200);
    }

    /**
     * Therapist can view all his/her appointments with clients
     *
     * @param int  $therapistId
     * @return array
     */
    public function therapistAppointments($therapistId)
    {
        // Check if this action is performed by the logged in user
        if (Auth::user()->id != $therapistId) {
          return response()->json([
              'error' => ['code' => 403, 'message' => "Forbidden to access another user's details"]
          ], 403);
        }

        $appointments = User::where('id', Auth::user()->id)
                              ->with(['therapistAppointments.client'])
                              ->first();

        return response()->json([
          'status' => 'success',
          'code' => 200,
          'message' => 'OK',
          'data' => $appointments
        ], 200);
    }

    /**
     * Therapist can view only one of his/her appointment with a client
     *
     * @param int  $appointmentId
     * @param int  $therapistId
     * @return array
     */
    public function therapistSingleAppointment($appointmentId, $therapistId)
    {
        // Check if this action is performed by the logged in user
        if (Auth::user()->id != $therapistId) {
          return response()->json([
              'error' => ['code' => 403, 'message' => "Forbidden to access another user's details"]
          ], 403);
        }

        $appointment = Appointment::where('therapist_id', $therapistId)
                                    ->where('id', $appointmentId)
                                    ->with('client')
                                    ->first();

        if (!$appointment) {
            return response()->json([
                'error' => ['code' => 404, 'message' => 'Appointment not found']
            ], 404);
        }

        return response()->json([
          'status' => 'success',
          'code' => 200,
          'message' => 'OK',
          'data' => $appointment
        ], 200);
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
        // Check if this action is performed by the logged in user
        if (Auth::user()->id != $therapistId) {
            return response()->json([
                'error' => ['code' => 403, 'message' => "Forbidden to access another user's details"]
            ], 403);
        }

        $appointment = Appointment::where('id', $appointmentId)
                                ->where('therapist_id', $therapistId)
                                ->with('client')
                                ->first();

        if (!$appointment) {
            return response()->json([
                'error' => ['code' => 404, 'message' => 'Appointment not found']
            ], 404);
        }

        DB::beginTransaction();
        $appointment->update(["status" => "rejected"]);
        DB::commit();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'OK',
            'data' => $appointment
        ], 200);
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
        // Check if this action is performed by the logged in user
        if (Auth::user()->id != $therapistId) {
            return response()->json([
                'error' => ['code' => 403, 'message' => "Forbidden to access another user's details"]
            ], 403);
        }

        $appointment = Appointment::where('id', $appointmentId)
                                ->where('therapist_id', $therapistId)
                                ->with('client')
                                ->first();

        if (!$appointment) {
            return response()->json([
                'error' => ['code' => 404, 'message' => 'Appointment not found']
            ], 404);
        }

        DB::beginTransaction();
        $appointment->update(["status" => "accepted"]);
        DB::commit();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'OK',
            'data' => $appointment
        ], 200);

    }

}
