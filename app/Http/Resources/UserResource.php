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
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
            'therapist' => [
                'fee_per_hour' => $this->fee_per_hour,
                'user_id' => $this->user_id,
                'rating' => $this->rating,
                'years_of_experience' => $this->years_of_experience
            ]
        ];
    }
}
