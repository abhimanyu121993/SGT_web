<?php

namespace App\Models\customer;

use App\Helpers\Helper;
use App\Models\City;
use App\Models\CustomerSubscribePack;
use App\Models\Leave;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Spatie\Activitylog\Facades\CauserResolver;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\MorphMany;
class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;
    public static $owner = 'owner', $employee = 'employee';
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

    //clauser for creating member list
    protected static function booted(): void
    {
        static::created(function (Customer $customer) {
           

                $customer->members()->create(['ownerable_type'=>get_class(new Customer),'ownerable_id'=>$customer->owner_id]);
            
        });
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
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($item) {
            $item->syncRoles([]);
            $item->syncPermissions();
        });
    }
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
    public function getOwnerAttribute()
    {
        if (strtolower($this->type) == strtolower(Customer::$owner)) {
            return $this->id;
        } else if (strtolower($this->type) == strtolower(Customer::$owner)) {
            return $this->owner_id;
        }
    }
    public function leaves():MorphMany
    {
        return $this->morphMany(Leave::class,'leaveable');
    }
    public function timezone()
    {
       return $this->customer_profile()->timezone;
    }

    public function members()
    {
        return $this->morphMany(Member::class,'membrable');
    }
    public function member_owner()
    {
        return $this->morphMany(Member::class,'ownerable');
    }
}
