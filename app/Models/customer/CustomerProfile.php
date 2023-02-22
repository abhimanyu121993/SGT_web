<?php

namespace App\Models\customer;

use App\Models\City;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerProfile extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id','id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
   
}
