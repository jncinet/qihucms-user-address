<?php

namespace Qihucms\UserAddress\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAddress extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'uri' => $this->uri,
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
