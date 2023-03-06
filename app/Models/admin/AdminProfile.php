<?php

namespace App\Models\admin;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\TimeZone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminProfile extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function admin_profile()
    {
        return $this->belongsTo(Admin::class, 'id');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
    public function county_detail()
    {
        return $this->belongsTo(Country::class, 'country','id');
    }
    public function state_detail()
    {
        return $this->belongsTo(State::class, 'state');
    }
    public function city_detail()
    {
        return $this->belongsTo(City::class, 'city');
    }
    public function timezone()
    {
       return $this->belongsTo(TimeZone::class,'time_zone_id');
    }

}
