<?php

namespace App\Http\Resources\API\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDataResource extends JsonResource
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
            'username' => $this->username,
            'email' => $this->email,
            'name' => $this->profile->name,
            'email-verified' => $this->email_verified_at,
            //? Cek Data Licence On User. With Make Operator Ternary.
            'licence' => $this->licence ? $this->licence->licence : 'Not Exist Licence'
        ];
    }
}
