<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\User;
use App\Therapist;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

class AuthController extends Controller
{

public $successStatus = 200;

/**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
	public function check()
	{
		//return json_encode('true');
	}
    public function login(Request $request){
    //	return request('email');
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['role'] = $user->role;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

	/**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
			'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $user = User::create([
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('password')),
            'role'=>$request->get('role'),
        ]);

        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['first_name'] =  $user->first_name;
        $success['role'] = $user->role;
        return response()->json(['success'=>$success], $this->successStatus);
    }

    /**
     * Endpoint specifically for registering a therapist
     * This endpoint firstly creates a user account and
     * associates that user account with a therapist account
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function registerTherapist(Request $request)
    {
        $validate = Validator::make($request->all(),[

            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required',


            'fee_per_hour'=>'required|digits_between:0,1000000',
            'years_of_experience'=>'numeric',
            'availability'=>['required',Rule::in([true,false])],
            'name_of_practice'=>'required|string',
            'office_phone'=>'required|min:10',
            'address_line_1'=>'required|string|min:3',
            'city'=>'required|string|min:3',
            'state'=>'required|string|min:3',
            'country'=>'required|string|min:3',
            'personal_pronouns'=>'required|string|min:3',
            'type_of_therapist'=>'required',
            'type_of_license'=>'required',
            'year_licensed'=>'required',
            'personal_statement'=>'required|string|min:10',
            'practice_website'=>'required|url',
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
            $success['therapistId'] = $therapist->id;
            return response()->json(['success'=>$success], 200,[]);
        }
    }
/**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

    public function logout()
    {
        DB::table('oauth_access_tokens')
        ->where('user_id', Auth::user()->id)
        ->update([
            'revoked' => true
        ]);

        return response()->json(['status'=>true]);
    }


}
