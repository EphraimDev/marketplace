<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TherapistResource extends Resource
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
            "id" => $this->id,
            "type_of_therapist" => $this->type_of_therapist,
            "type_of_license" => $this->type_of_license,
            "years_of_experience" => $this->years_of_experience,
            "year_licensed" => $this->year_licensed,
            "postgraduate_institute" => $this->postgraduate_institute,
            "name_of_practice" => $this->name_of_practice,
            "practice_website" => $this->practice_website,
            "office_phone" => $this->office_phone,
            "address_line_1" => $this->address_line_1,
            "address_line_2" => $this->address_line_2,
            "city" => $this->city,
            "state" => $this->state,
            "country" => $this->country,
            "personal_statement" => $this->personal_statement,
            "fee_per_hour" => $this->fee_per_hour,
            "rating" => $this->rating,
            "personal_pronouns" => $this->personal_pronouns,
            "availability" => $this->availability,
            "verified" => $this->verified,
            "user_id" => $this->user_id,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "user" => [
                "id" => $this->user->id,
                "first_name" => $this->user->first_name,
                "last_name" => $this->user->last_name,
                "email" => $this->user->email,
                "role" => $this->user->role,
                "phone" => $this->user->phone,
                "title" => $this->user->title,
                "image_name" => $this->user->image_name,
                "image_url" => $this->user->image_url
            ],
            "verifications" => $this->verifications
        ];
    }

    public function with($request)
    {
        return [
            "status" => "success",
            "code" => 200,
            "message" => "OK",
        ];
    }
}
