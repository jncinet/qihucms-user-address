<?php

namespace Qihucms\UserAddress\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserAddressCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
