<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SecurityGuardResource extends JsonResource
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
            'name'=>$this->name,
            // 'role'=>$this->getRoleNames(),
            // 'permission'=>$this->getPermissionNames(),
            'email'=>$this->email,
            'contact_no'=>$this->phone,
            'city'=>$this->city->name,
            'city_id'=>$this->city_id,
            'state'=>$this->state->name,
            'state_id'=>$this->state_id,
            'country'=>$this->country->name,
            'country_id'=>$this->country_id,
            'zipcode'=>$this->pincode,
            'card_img'=>$this->card_image?asset('storage/'.$this->card_image):'',
            'profile_img'=>asset('storage/'.$this->images)
        ];
    }
}
