<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Therapist;

class TherapistController extends Controller
{
    public function index()
    {
        $therapists = Therapist::all();
        return response()->json([$therapists]);
    }
}
