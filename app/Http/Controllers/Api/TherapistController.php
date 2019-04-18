<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Therapist;
use Validator;

class TherapistController extends Controller
{
    /**
     * Get all the therapists
     *
     * @return array
     */
    public function index()
    {
    	$allTherapist=User::where('role', 'therapist')->get();

    	return response()->json([$allTherapist]);
    }

    /**
     * Get just one therapist
     *
     * @param int  $id
     * @return array
     */
    public function show($id)
    {
        //

        $therapist=Therapist::findOrFail($id);
        return response()->json([$therapist]);
    }

    /**
     * Get ONLY available therapists
     *
     * @return array
     */
    public function avilableTherapists()
    {

        $therapists = Therapist::where('availability', true)->get();

        return response()->json([$therapists]);
    }

    /**
     * Search for therapists by name
     *
     * @return array
     */
    public function search($name)
    {
    	$therapists=User::where([['first_name','like',"%{$name}%"],['role','=','therapist']])
        ->orWhere([['last_name','like',"%{$name}%"],['role','=','therapist']])->get();

    	return response()->json([$therapists]);
    }

    /**
     * This endpoint is used by the
     * admin to verify a therapist
     *
     * @param int  $id
     * @return Illuminate\Http\Response -- boolean
     */
    public function verify($id)
    {
        $therapist = Therapist::find($id);
        $therapist->verified = true;
        return response()->json(['success'=>true], 200, []);
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
    public function requestVerify(Request $request, $id)
    {
        $therapist = Therapist::find($id);
        if(!$therapist){
            return response()->json([['success'=>false,'message'=>'no therapist with this id']], 200, []);
        }
        $message =[
            'identity_card.required' => 'A valid means of identification is required for you to be verified',
            'identity_card.image' => 'Identity card must be an image file',
            'license_image.required' => 'Your license to practise is required',
            'license_image.image' => 'licence must be an image file',
        ];
        $validate = Validator::make($request->all(),[
            'identity_card' => 'required|image',
            'license_image' => 'required|image'
        ], $message);

        if($validate->fails()){
            return response()->json([$validate->errors()], 200, []);
        }else{
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
            return response()->json(['success'=>true,$therapist->verification], 200, []);
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
    public function update(Request $request,$id)
    {
        //


        $therapist=Therapist::findOrFail($id);
        $therapist->update($request->all());
return $therapist;
        return response()->json(['success'=>true]);
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
