<?php

namespace App\Models;
use App\Helpers\Helper;
use App\Models\customer\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Spatie\Activitylog\Facades\CauserResolver;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class CustomerSubscribePack extends Model
{
    use HasFactory,LogsActivity;
    protected $guarded = [];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscribe_id');
    }
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
