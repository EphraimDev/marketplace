<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Therapist;

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
     * Verify a therapist
     * 
     * @param int  $id
     * @return array
     */
    public function verify($id)
    {
        $validate = Validator::make($request->all(),[

            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required',

            'age'=>'required|numeric',
            'fee_per_hour'=>'required|digits_between:0,1000000',
            'years_of_experience'=>'numeric',
            'availability'=>['required',Rule::in([true,false])],
            'name_of_practice'=>'required|string',
            'phone'=>'required|min:10',
            'address_1'=>'required|string|min:3',
            'city'=>'required|string|min:3',
            'state'=>'required|string|min:3',
            'country'=>'required|string|min:3',
            'personal_pronouns'=>'required|string|min:3',
            'therapist_type'=>'required',
            'type_of_license'=>'required',
            'licensed_in'=>'required',
            'personal_statement'=>'required|string|min:10',
            'practice_website'=>'required|url',
            'profile_photo_link'=>'required|url'
        ]);
        if($validate->fails()){
            return response()->json(['error'=>$validate->errors()], 401);
        }else{
            $user = User::create([
                'first_name'=>$request->get('first_name'),
                'last_name'=>$request->get('last_name'),
                'email'=>$request->get('email'),
                'password'=>bcrypt($request->get('password')),
                'role'=>'therapist',
                ]);
            $data = $request->except(['first_name','last_name','email','password']);
            $data['user_id'] = $user->id;
            $therapist = Therapist::create($data);
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['name'] =  $user->name;
            return response()->json(['success'=>$success], 200,[]);
        }
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
        return $request->all();
        
        $therapist=Therapist::findOrFail($id);
        $therapist->update($request->all());

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
