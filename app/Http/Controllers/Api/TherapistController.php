<?php

namespace App\Http\Controllers\Api;

use DB;
use App\User;
use Validator;
use App\Therapist;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TherapistController extends Controller
{
    /**
     * Get all the therapists
     *
     * @return array
     */
    public function index()
    {
    	$therapists = User::where('role', 'therapist')->get();

    	return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'message' => 'Successful',
            'data' => $therapists
        ], 200);
    }

    /**
     * Get just one therapist
     *
     * @param int  $id
     * @return array
     */
    public function show($id)
    {
        $therapist = User::where('id', $id)->where('role', 'therapist')->first();

        if (!$therapist) {
            return response()->json(['error' => 'Therapist not found'], 404);
        }

        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'message' => 'Successful',
            'data' => $therapist
        ], 200);
    }

    /**
     * Get ONLY available therapists
     *
     * @return array
     */
    public function avilableTherapists()
    {
        $therapists = Therapist::where('availability', true)
                                ->with([
                                    'user:id,first_name,last_name,email,role',
                                    'user.therapist:id'
                                ])->get();

        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'message' => 'Successful',
            'data' => $therapists
        ], 200);
    }

    /**
     * Search for therapists by name
     *
     * @return array
     */
    public function search($name)
    {
    	$therapists = User::where([['first_name','like',"%{$name}%"], ['role','=','therapist']])
                            ->orWhere([['last_name','like',"%{$name}%"], ['role','=','therapist']])
                            ->get();

        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'message' => 'Successful',
            'data' => $therapists
        ], 200);
    }

    /**
     * This endpoint is used by the admin to verify if a therapist is verified
     *
     * @param int  $therapistId
     * @return boolean  Illuminate\Http\Response
     */
    public function verify($therapistId)
    {
        $therapist = Therapist::where('id', $therapistId)->first();

        if (!$therapist) {
            return response()->json(['error' => 'Therapist not found'], 404);
        }

        $verificationStatus = $therapist->verified == 0 ? false : true;

        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'message' => 'Successful',
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
            return response()->json(['error' => "Can not update another therapist's account"], 403);
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
            return response()->json([$validate->errors()], 200);
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
                'statusCode' => 200,
                'message' => 'Successful',
                'data' => [$therapist->verification]
            ], 200);
        }
    }

    public function unverifiedTherapists(Request $request)
    {
        $user = collect();
        $therapists = Therapist::where('verified',false)->get()->each(function($therapist) use ($user){
        $user->push($therapist);
        $therapist->verification;
        });
        return response()->json($user, 200, []);
    }

    /**
     * Update a therapist's data
     *
     * @param int  $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        // Check if this action is performed by the logged in therapist
        if (Auth::user()->id != $id) {
            return response()->json(['error' => "Can not update another therapist's account"], 403);
        }

        // Validate input
        $validate = Validator::make($request->all(),[
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'password' => 'required',
            'fee_per_hour' => 'required|digits_between:0,1000000',
            'years_of_experience' => 'numeric',
            'availability' => ['required',Rule::in([true,false])],
            'name_of_practice' => 'required|string',
            'office_phone' => 'required|min:10',
            'address_line_1' => 'required|string|min:3',
            'city' => 'required|string|min:3',
            'state' => 'required|string|min:3',
            'country' => 'required|string|min:3',
            'personal_pronouns' => 'required|string|min:3',
            'type_of_therapist' => 'required',
            'type_of_license' => 'required',
			'year_licensed' => 'required',
            'years_of_experience' => 'required',
            'personal_statement' => 'required|string|min:10',
            'practice_website' => 'required|url',
        ]);

        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()], 422);
        } else {
            DB::beginTransaction();

            // Update user table
            $user = $request->only(['first_name','last_name','email','password', 'role']);

            $userResponse = Auth::user()->update([
                "first_name" => $user['first_name'],
                "last_name" => $user['last_name'],
                "password" => bcrypt($user['password'])
            ]);

            // Update therapist table
            $therapistData = $request->except(['first_name','last_name','email','password', 'role']);
            Auth::user()->therapist->update($therapistData);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'statusCode' => 200,
                'message' => 'Successful'
            ], 200);
        }
    }

    /**
	 * toggles the availability of the user
	 *
	 * @param string  $id
	 * @return array
     */
    public function changeStatus($user)
    {
    	if ($this->getCurrentStatus($user) == 1) {
    		Therapist::where('user_id',$user)->update(['availability' => 0]);
    		return response()->json(['curr_state'=>'off']);
    	} else {
    		Therapist::where('user_id',$user)->update(['availability' => 1]);
    		return response()->json(['curr_state'=>'on']);
    	}

    }

    /**
     * Custom controller function to fetch a therapist's status
     *
     * @param int  $id
     * @return mixed
     */
    public function getCurrentStatus($id)
    {
        $user = User::findOrFail($id);
        return $user->therapist->availability;
    }

    public function destroy($id)
    {
        $therapist=Therapist::findOrFail($id);
        $user_record=$therapist->user_id;
        $therapist->delete();
        User::findOrFail($user_record)->delete();

        return response()->json(['status'=>true]);
    }

}
