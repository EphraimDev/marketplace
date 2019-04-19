<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

            protected $fillable=
            	['user_id','therapist_id','reason_for_visit','previous_therapy','status','payment_mode','appointment_date','appointment_start_time','appointment_end_time'];


    //Table Relationships: Don't edit any relationship if you are not sure
    public function client()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id')->withDefault();
    }

    public function therapist()
    {
    	return $this->belongsTo('App\User', 'therapist_id', 'id')->withDefault();
    }
}
