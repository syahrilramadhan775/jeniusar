<?php

namespace App\Http\Resources\API\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;

class QrRegistrationResource extends JsonResource
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
            'status_code' => 200,
            'message' => 'Success Registration',
        ];
    }
}
