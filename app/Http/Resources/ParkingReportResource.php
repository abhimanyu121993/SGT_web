<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParkingReportResource extends JsonResource
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
            'parking_id'=>$this->id,
            'title'=>$this->title,
            'vehical_type'=>$this->vehical_type,
            'model'=>$this->model,
            'color'=>$this->color,
            'license_no'=>$this->license_no,
            'state'=>$this->state_info->name,
            'towed'=>$this->towed==1?'yes':'No',
            'record_sample'=>$this->record_sample
          ];  
          }
}
