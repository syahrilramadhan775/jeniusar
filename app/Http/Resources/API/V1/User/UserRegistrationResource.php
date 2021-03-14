<?php

namespace App\Http\Resources\API\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserRegistrationResource extends JsonResource
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
            'status' => true,
            'message' => 'Berhasil Registrasi',
        ];
    }
}
