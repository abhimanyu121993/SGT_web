<?php

namespace App\Models\customer;

use App\Models\City;
use App\Models\CustomerSubscribePack;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public static $owner='owner',$employee='employee';
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'created_by',
        'owner_id', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer_profile()
    {
        return $this->hasOne(CustomerProfile::class, 'customer_id');
    }

    public function user_detail()
    {
        return $this->hasOne(CustomerProfile::class, 'customer_id');
    }
    public function customer_subscribe()
    {
        return $this->hasOne(CustomerSubscribePack::class, 'customer_id');
    }

     // get first name and last name seperatally
     public function getFirstnameAttribute()
     {
         return explode(' ', $this->name)[0] ?? '';
     }
     public function getLastNameAttribute()
     {
         return explode(' ', $this->name)[1] ?? '';
     }
     public function getOwnerAttribute(){
        if(strtolower($this->type)==strtolower(Customer::$owner)){
            return $this->id;
        }
        else if(strtolower($this->type)==strtolower(Customer::$owner)){
            return $this->owner_id;
        }
     }
}
