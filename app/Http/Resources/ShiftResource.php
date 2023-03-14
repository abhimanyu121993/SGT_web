<?php

namespace App\Http\Resources;

use App\Helpers\Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class ShiftResource extends JsonResource
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
            'shift_id'=>$this->shift->id,
            'shift_name'=>$this->shift->name,
            'shift_start'=>Helper::getLocalTimeOnly($this->shift->start_time),
            'shift_end'=>Helper::getLocalTimeOnly($this->shift->end_time),
            'duty_date'=>$this->duty_date
          ];
    }
}
