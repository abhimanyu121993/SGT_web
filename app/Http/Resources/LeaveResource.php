<?php

namespace App\Http\Resources;

use App\Helpers\Helper;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class LeaveResource extends JsonResource
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
        'leave_start'=>Helper::getLocalTime($this->leave_start->format('d-m-Y h:i')),
        'leave_end'=>Helper::getLocalTime($this->leave_end->format('d-m-Y h:i')),
        'status'=>$this->status_info->name
      ];
    }
}
