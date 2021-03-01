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
            'license' => $this->licence ? $this->licence->licence : '<span class="text-red-400">Unlicenced</span>',
            // '' =>
            'created_at' => $this->licence ? $this->licence->updated_at->diffForHumans()
                :  $this->created_at->diffForHumans(),
        ];
    }
}
