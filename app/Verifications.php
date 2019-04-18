<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verifications extends Model
{
    //
    protected $guarded = ['id'];

    public function therapist()
    {
        return $this->belongsTo('App\Therapist');
    }
}
