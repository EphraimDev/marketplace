<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\therapist;

class TherapistController extends Controller
{
    //
    function index(){

        $therapists = therapist::all();
        return response()->json($therapists);
    }
}
