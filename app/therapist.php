<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
