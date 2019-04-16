<?php

namespace App\Http\Controllers\API;

use App\Therapist;
use App\User;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

 class TherapistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $therapists = Therapist::all();
        return response()->json([$therapists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * Fetches aTherapist profile with its associated user profile.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function fetchProfile(Request $request,$id){
        $therapist = Therapist::where('user_id',$id)->first();
        if($therapist){
            $therapist['own'] = false;
            if($request->user()->id == $therapist->user_id){
                $therapist['own'] = true;
            }
        }

        return response()->json([$therapist,$therapist->user], 200, []);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
