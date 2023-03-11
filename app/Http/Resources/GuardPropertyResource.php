<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuardPropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
        'id'=>$this->id,
        'name'=>$this->name,
        'address'=>$this->address,
        'pincode'=>$this->postcode,
        'longitude'=>$this->longitude,
        'lattitude'=>$this->lattitude,
        'thumbnail'=>$this->file,
        'property_images'=>$this->property_images
       ];

}
}
