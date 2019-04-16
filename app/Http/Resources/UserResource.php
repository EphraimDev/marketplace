<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uid' => $this->uid,
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
            'therapist' => [
                'fee_per_hour' => $this->fee_per_hour,
                'location' => $this->location,
                'rating' => $this->rating,
                'age' => $this->age,
                'years_of_experience' => $this->years_of_experience
            ]
        ];
    }
}
