<?php

namespace App\Http\Controllers\Api;

use DB;
use App\User;
use Validator;
use App\Therapist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\TherapistResource;
use App\Http\Requests\UpdateTherapistRequest;
use App\Http\Resources\TherapistResourceCollection;
use App\Http\Resources\SearchTherapistResourceCollection;

class TherapistController extends Controller
{
    /**
     * Get all the therapists
     *
     * @return array
     */
    public function index()
    {
    	$therapists = Therapist::with(['user'])->get();

        return new TherapistResourceCollection($therapists); 
    }

    /**
     * Get just one therapist
     *
     * @param int  $therapistId
     * @return array
     */
    public function show($therapistId)
    {
        $therapist = Therapist::where('id', $therapistId)
                                ->with(['user'])
                                ->first();

        if (!$therapist) {
            return response()->json([
                'error' => ['code' => 404, 'message' => 'Therapist not found']
            ], 404);
        }

        return new TherapistResource($therapist); 
    }

    /**
     * Get ONLY available therapists
     *
     * @return array
     */
    public function avilableTherapists()
    {
        $therapists = Therapist::where('availability', true)
                                ->with(['user','verifications'])
                                ->get();

        return new TherapistResourceCollection($therapists); 
    }

    /**
     * Search for therapists by name
     *
     * @param string  $name
     * @return array
     */
    public function search($name)
    {
    	$therapists = User::where([['first_name','like',"%{$name}%"], ['role','=','therapist']])
                            ->orWhere([['last_name','like',"%{$name}%"], ['role','=','therapist']])
                            ->with('therapist.verifications')
                            ->get();

        return new SearchTherapistResourceCollection($therapists); 
    }

    /**
     * This endpoint is used by the admin to check if a therapist is verified
     *
     * @param int  $therapistId
     * @return boolean  Illuminate\Http\Response
     */
    public function verifyStatus($therapistId)
    {
        $therapist = Therapist::where('id', $therapistId)->first();

        if (!$therapist) {
            return response()->json([
                'error' => ['code' => 404, 'message' => 'Therapist not found']
            ], 404);
        }

        $verificationStatus = $therapist->verified == 0 ? false : true;

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'OK',
            'data' => ['verified' => $verificationStatus]
        ], 200);
    }

    /**
     * This endpoint is used by a therapist
     *  to request for verification, after they might have successfully
     * created an account.
     *
     * @param Illuminate\Http\Request
     * @param int id
     * @return boolean
     */
    public function requestVerification(Request $request, $id)
    {
        // Check if this action is performed by the logged in therapist
        $therapist = Auth::user()->therapist;
        if ($therapist->id != $id) {
            return response()->json([
                'error' => ['code' => 403, 'message' => "Forbidden to request verfication for another therapist"]
            ], 403);
        }

        $message = [
            'identity_card.required' => 'A valid means of identification is required for you to be verified',
            'identity_card.image' => 'Identity card must be an image file',
            'license_image.required' => 'Your license to practise is required',
            'license_image.image' => 'licence must be an image file',
        ];

        $validate = Validator::make($request->all(),[
            'identity_card' => 'required|image',
            'license_image' => 'required|image'
        ], $message);

        if ($validate->fails()) {
            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => "Unprocessable Entity",
                    'errors' => $validate->errors()
                ]
            ], 422);
        } else {
            $identityExt = $request->file('identity_card')->getClientOriginalExtension();
            $identityName = 'identity-card-'.time().'.'.$identityExt;
            $identityPath = $request->file('identity_card')->storeAs('verification',$identityName);
            $licenseExt = $request->file('license_image')->getClientOriginalExtension();
            $licenseName = 'license_image-'.time().'.'.$licenseExt;
            $licensePath = $request->file('license_image')->storeAs('verification',$licenseName);
            $path = Storage::url($licensePath);
            $therapist->verification()->createMany([
                ['document_link'=> Storage::url($licensePath)],
                ['document_link'=> Storage::url($identityPath)]
            ]);

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'OK',
                'data' => [$therapist->verification]
            ], 200);
        }
    }

    public function unverifiedTherapists()
    {
        $therapists = Therapist::where('verified', false)
                                ->with(['user','verifications'])
                                ->get();

        return new TherapistResourceCollection($therapists); 
    }

    public function verifiedTherapists()
    {
        $therapists = Therapist::where('verified', true)
                                ->with(['user','verifications'])
                                ->get();

        return new TherapistResourceCollection($therapists); 
    }

    /**
     * Update a therapist's data
     *
     * @param \App\Http\Requests\UpdateTherapistRequest  $request
     * @param int  $therapistId
     * @return array
     */
    public function update(UpdateTherapistRequest $request, $therapistId)
    {
        // Check if this action is performed by the logged in therapist
        if (Auth::user()->therapist->id != $therapistId) {
            return response()->json([
                'error' => ['code' => 403, 'message' => "Forbidden to update another therapist's details"]
            ], 403);
        }

        DB::beginTransaction();

        // Update user table
        $user = $request->only(['title', 'first_name', 'last_name', 'phone', 'email', 'password', 'role', 'image']);

        Auth::user()->update([
            "title" => $user['title'] ?? null,
            "first_name" => $user['first_name'],
            "last_name" => $user['last_name'],
            "phone" => $user['phone'] ?? null,
            "password" => bcrypt($user['password'])
        ]);

        // Update therapist table
        $therapistData = $request->except(['title', 'first_name', 'last_name', 'phone', 'email', 'password', 'role', 'image']);
        Auth::user()->therapist->update($therapistData);

        DB::commit();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'OK'
        ], 200);
        
    }

    /**
	 * Toggles the availability of the user
	 *
	 * @param string  $therapistId
	 * @return array
     */
    public function changeAvailability($therapistId)
    {
        // Check if this action is performed by the logged in therapist
        $therapist = Auth::user()->therapist;
        if ($therapist->id != $therapistId) {
            return response()->json([
                'error' => ['code' => 403, 'message' => "Forbidden to update another therapist's details"]
            ], 403);
        }

        $availability = $therapist->availability == 1 ? false : true;

        DB::beginTransaction();
        $therapist->update(['availability' => $availability]);
        DB::commit();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'OK'
        ], 200);
    }

}
