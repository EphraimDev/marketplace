<?php
 namespace App\Http\Controllers\API;
 use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Therapist;
 class TherapistController extends Controller
{
    public function index()
    {
        $therapists = Therapist::all();
        return response()->json([$therapists]);
    }

    public function getAllTherapist()
    {
    	$allTherapist=User::where('role','therapist')->get();
    	 return response()->json([$allTherapist]);
    }

    public function search($name)
    {
    	$therapists=User::where([['name','like',"%{$name}%"],['role','=','therapist']])->get();
    	  return response()->json([$therapists]);
    }

    public function getCurrStatus($user)
    {
    	$user=User::findOrFail($user);
    	return $user->therapist->availability;

    }
/**
	 * toggles the availability of the user
	 * 
	 * @param string  $id
	 * @return array
     */
    public function changeStatus($user)
    {
    	if($this->getCurrStatus($user) == 1)
    	{
    		Therapist::where('user_id',$user)->update(['availability'=>0]);
    		return response()->json(['curr_state'=>'off']);
    	}
    	else{

    		Therapist::where('user_id',$user)->update(['availability'=>1]);
    		return response()->json(['curr_state'=>'on']);
    	}

    }


}
