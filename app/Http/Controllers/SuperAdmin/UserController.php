<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Therapist;
use App\Appointment;
use Validator;



class UserController extends Controller
{


    public function allUsers()
    {
    	$users=User::where('role','ordinary-user')->paginate();

    	return view('superadminBE.all_users',compact('users'));
    }


     //
	public function showCreateForm()
	{
		return view('superadminBE.createUser');
	}

	public function storeUser(Request $request)
	{
		  

		  $message =[
            'first_name.required' => 'the users first name is required',
            'last_name.required' => 'the users last name is required',
            'email.unique' => 'a user exist with this email already',
            'password.required' => 'the user password is required',
        ];
        $validate = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'unique:users',
            'password'=>'required'
        ], $message);

         if($validate->fails()){
             return back()->withErrors($validate->errors());
        }



		User::create([
			"first_name"=>$request->first_name,
			"last_name"=>$request->last_name,
			"email"=>$request->email,
			"password"=>$request->password,
			"role"=>"ordinary-user"

		]);

		return back()->with(['success'=>"user suucessfully created"]);
	}


    
    public function deleteUser($id)
    {
    	//id comes from the user table

    	$user=User::findOrFail($id);
    	$user->delete();

    	return back()->with(['success'=>'deleted']);
    }

    public function show($id)
    {	
    	$user=User::findOrFail($id);
    	return view('superadminBE.single_user',compact('user'));
    }

    public function editForm($id)
    {
    	$user=User::findOrFail($id);
    	return view('superadminBE.edit_user_form',compact('user'));


    }

    public function update(Request $request,$id)
    {
    	//no validation checks yet

    	$user=User::findOrFail($id);
    	$user->update($request->all());

    	return back()->with(['success'=>true]);

    }

}
