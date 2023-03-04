<?php

namespace App\Models\customer;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Spatie\Activitylog\Facades\CauserResolver;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
class Task extends Model
{
    use HasFactory,SoftDeletes,LogsActivity;
    protected $guarded=[];

     //revoke role and permission on delete 
     public function getActivitylogOptions(): LogOptions
     {
         return LogOptions::defaults()->logAll();
         // Chain fluent methods for configuration options
     }
     public function tapActivity(Activity $activity, string $eventName)
     {
         
             $activity->causer_type = get_class(Auth::guard(Helper::getGuard())->user());
             $activity->causer_id=Helper::getUserId();
         
     }
}
