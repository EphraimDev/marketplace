<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //Table Relationships: Don't edit any relationship if you are not sure
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id')->withDefault();
    }

    public function therapist()
    {
    	return $this->belongsTo('App\User', 'therapist_id', 'id')->withDefault();
    }
}
