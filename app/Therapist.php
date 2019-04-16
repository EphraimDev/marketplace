<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
	/**
	 * PLEASE DON'T DELETE THIS FILE. STILL UNDER REVIEW
	 *
	 */
	
	//Table Relationships: Don't edit any relationship if you are not sure
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id')->withDefault();
    }
}
