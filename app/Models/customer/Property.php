<?php

namespace App\Models\customer;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function city_details()
    {
        return $this->belongsTo(City::class, 'city');
    }
    public function state_details()
    {
        return $this->belongsTo(State::class, 'state');
    }
}