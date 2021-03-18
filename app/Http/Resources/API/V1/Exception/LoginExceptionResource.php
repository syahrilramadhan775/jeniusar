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
            'status_code' => 401,
            'message' => "Unauthorized Data."
        ];
    }
}
