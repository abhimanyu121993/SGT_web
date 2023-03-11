<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DutyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
          'duty_id'=>$this->id,
          'property'=>new GuardPropertyResource($this->property)
        ];
    }
}
