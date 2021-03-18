<?php

namespace App\Http\Resources\API\V1\Exception;

use Illuminate\Http\Resources\Json\JsonResource;

class QrRegisterException extends JsonResource
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
            'status' => 401,
            'problems' => [
                'licence' => 'The Licence Already Exists'
            ]
        ];
    }
}
