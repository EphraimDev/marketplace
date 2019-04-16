<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class OrdinaryUserController extends Controller
{
    //
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/marketplace');
    }
}
