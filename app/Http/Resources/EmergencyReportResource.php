<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmergencyReportResource extends JsonResource
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
            'date_time'=>$this->date_time,
            'longitude'=>$this->longitude,
            'lattitude'=>$this->lattitude,
            'emergency_notes'=>$this->emergency_notes,
            'witness_name'=>json_decode($this->witness_name),
            'witness_phone'=>json_decode($this->witness_phone),
            'action_notes'=>$this->action_notes,
            'police_report'=>$this->police_report,
            'officer_name'=>$this->officer_name,
            'officer_designation'=>$this->officer_designation,

            'record_sample'=>$this->record_sample
        ];  
            }
}
