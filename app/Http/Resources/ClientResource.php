<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'email' => $this->email,
            'username' => $this->username,
            'name' =>  $this->profile->name,
            'license' => $this->licence->licence,
            // '' =>
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
