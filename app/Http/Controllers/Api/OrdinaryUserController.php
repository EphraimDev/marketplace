<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class OrdinaryUserController extends Controller
{
    /**
     * Fetch all ordinary users
     *
     * @return array
     */
    public function index()
    {
        // 
        $user = User::where('role', 'ordinary_user')->get();

        return  response()->json(["users" => $user]);
    }

    /**
     * Fetch a single ordinary user
     *
     * @param  int  $id
     * @return array
     */
    public function show($id)
    {
        // 

        $user = User::findOrFail($id);

        return  response()->json(["users" => $user]);
    }

    /**
     * Update an ordinary user
     *
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        // 
        return $request->all();
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json(['suuccess' => true]);
    }

    /**
     * Delete an ordinary user
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['suuccess' => true]);
    }

    /**
     * Update an ordinary user's status
     *
     * @param  int  $id
     * @return array
     */
    public function updateStatus($id)
    {
        // 
    }

    /**
     * An ordinary user can pay via Paystack
     *
     * @param  int  $id
     * @return array
     */
    public function pay($id)
    {
        return response(["status" > true, "msg" => "Pay method"]);
    }
}
