<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
=======
>>>>>>> abhi123
use Spatie\Permission\Traits\HasRoles;

class SecurityGuard extends Authenticatable
{
<<<<<<< HEAD
    use HasApiTokens,HasFactory,SoftDeletes,Notifiable, HasRoles;
=======
    use HasFactory,SoftDeletes,HasRoles;
>>>>>>> abhi123
    protected $guarded=[];

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
}
