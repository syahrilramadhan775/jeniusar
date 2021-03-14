<?php

namespace App\Http\Resources\API\V1\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class LoginResource extends JsonResource
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
            'token' => Auth::user()->createToken('Unity')->plainTextToken,
            'data' => new UserDataResource($this)
        ];
    }
}
