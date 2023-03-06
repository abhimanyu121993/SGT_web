<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Traits\HasRoles;

class SecurityGuard extends Authenticatable
{
    use HasApiTokens,HasFactory,SoftDeletes,Notifiable, HasRoles;
    protected $guarded=[];
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
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function statusDetail()
    {
        return $this->belongsTo(Status::class, 'status');
    }

    public function leaves()
    {
        return $this->morphMany(Leave::class,'leaveable');
    }
    
    public function getTeamAttribute()
    {
        $teams=SecurityGuard::where('owner_id',Helper::getOwner())->get();
        return $teams;
    }
    public function timezone()
    {
       return $this->belongsTo(TimeZone::class,'time_zone_id');
    }
}
