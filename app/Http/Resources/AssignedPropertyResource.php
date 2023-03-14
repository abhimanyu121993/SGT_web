<?php

namespace App\Http\Resources;

use App\Helpers\Helper;
use App\Models\GuardDuty;
use App\Models\Status;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AssignedPropertyResource extends JsonResource
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
            'property_id'=>$this->property->id,
            'property_name'=>$this->property->name,
            'address'=>$this->property->address,
            'pincode'=>$this->property->postcode,
            'longitude'=>$this->property->longitude,
            'lattitude'=>$this->property->lattitude,
            'thumbnail'=>asset('storage/'.$this->property->file),
            'base_url_for_image'=>url('storage/').'/',
            'property_images'=>json_decode($this->property->property_pics),
            'description'=>$this->property->description,
            'guards_count'=>GuardDuty::where('property_id',$this->property_id)->distinct()->count('guard_id'),
            'checkpoints_count'=>20,
            'guard_name'=>Auth::guard('sanctum')->user()->name,
            'position'=>null,
            'last_shift'=>new UpcommingShiftResource(GuardDuty::with('shift')->where('guard_id',Auth::guard('sanctum')->user()->id)->where('status_id',Status::where('name', 'completed')->where('type', 'guard_duty')->first()->id)->latest()->first()),
            'shift_time'=>Helper::getLocalTimeOnly($this->shift->start_time).'-'.Helper::getLocalTimeOnly($this->shift->end_time),
            'upcomming_shift'=>new UpcommingShiftCollection(GuardDuty::with('shift')->where('guard_id',Auth::guard('sanctum')->user()->id)->where('status_id',Status::where('name', 'pending')->where('type', 'guard_duty')->first()->id)->get())
           ];
    }
}
