<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Therapist;
use App\Appointment;


class TherapistController extends Controller
{
    



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $therapists=Therapist::paginate(10);

        return view('superadminBE.therapist.index',compact('therapists'));
    }

    public function unVerifiedTherapist()
    {
        //
        $therapists=Therapist::where('verified',false)->paginate(10);

        return view('superadminBE.therapist.unverified',compact('therapists'));
    }


    public function VerifiedTherapist()
    {
        //
        $therapists=Therapist::where('verified',true)->paginate(10);

        return view('superadminBE.therapist.verified',compact('therapists'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('superadminBE.therapist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //creates the user first
    	$user=$request->only(['first_name','last_name','email','password']);
    	$user['role']="therapist";
    	$user=User::create($user);

    	//create the therapist
    	$therapist=$request->except(['first_name','last_name','email','password','confirm_password']);
    	$therapist['user_id']=$user->id;
        $therapist=Therapist::create($therapist);

        return redirect()->route('therapist.show',['id'=>$therapist->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $therapist=Therapist::findOrFail($id);

        return view('superadminBE.therapist.single_therapist',compact('therapist'));


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
        $therapist=Therapist::findOrFail($id);
        return view('superadminBE.therapist.edit',compact('therapist'));
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
            $therapist=Therapist::findOrFail($id);
            $user=User::findOrFail($therapist->user->id);

            $user_details=$request->only(['email','first_name','last_name']);

            $therapist_details=$request->except(['email','first_name','last_name']);
          
            $user->update($user_details);
            $therapist->update($therapist_details);

            return  redirect()->route('therapist.show',['id'=>$therapist->id]);


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
        $therapist=Therapist::findOrFail($id);
        $therapist->delete();

        //it should also delete the users record

        return back()->with(['msg'=>'deleted']);
    }

    public function verifyTherapist($id)
    {
    	$therapist=Therapist::findOrFail($id);
    	$therapist->update(['verified'=>true]);
    	return back()->with(['success'=>true]);
    }



}


   




