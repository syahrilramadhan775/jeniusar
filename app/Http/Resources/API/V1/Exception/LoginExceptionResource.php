<?php

namespace App\Http\Resources\API\V1\Exception;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginExceptionResource extends JsonResource
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
            'status' => false,
            'message' => "Unauthorized Data."
        ];
    }
}
