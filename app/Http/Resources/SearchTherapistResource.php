<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SearchTherapistResource extends Resource
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
            "type_of_therapist" => $this->therapist->type_of_therapist,
            "type_of_license" => $this->therapist->type_of_license,
            "years_of_experience" => $this->therapist->years_of_experience,
            "year_licensed" => $this->therapist->year_licensed,
            "postgraduate_institute" => $this->therapist->postgraduate_institute,
            "name_of_practice" => $this->therapist->name_of_practice,
            "practice_website" => $this->therapist->practice_website,
            "office_phone" => $this->therapist->office_phone,
            "address_line_1" => $this->therapist->address_line_1,
            "address_line_2" => $this->therapist->address_line_2,
            "city" => $this->therapist->city,
            "state" => $this->therapist->state,
            "country" => $this->therapist->country,
            "personal_statement" => $this->therapist->personal_statement,
            "fee_per_hour" => $this->therapist->fee_per_hour,
            "rating" => $this->therapist->rating,
            "personal_pronouns" => $this->therapist->personal_pronouns,
            "availability" => $this->therapist->availability,
            "verified" => $this->therapist->verified,
            "user_id" => $this->therapist->user_id,
            "created_at" => $this->therapist->created_at,
            "updated_at" => $this->therapist->updated_at,
            "user" => [
                "id" => $this->id,
                "first_name" => $this->first_name,
                "last_name" => $this->last_name,
                "email" => $this->email,
                "role" => $this->role,
                "phone" => $this->phone,
                "title" => $this->title,
                "image_name" => $this->image_name,
                "image_url" => $this->image_url
            ],
            "verifications" => $this->therapist->verifications
        ];
    }
}
