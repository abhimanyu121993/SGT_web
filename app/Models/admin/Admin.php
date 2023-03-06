<?php

namespace App\Models\admin;

use App\Helpers\Helper;
use App\Models\Leave;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;

    public static $admin = 'admin', $sub_admin = 'sub-admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'created_by',
        'type',
        'isactive',
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

    //revoke role and permission on delete 
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($item) {
            $item->syncRoles([]);
            $item->syncPermissions();
        });
    }

    // Activity log using model
    public function getActivitylogOptions(): LogOptions
    {
       
        return LogOptions::defaults()->logAll();
        // Chain fluent methods for configuration options
    }
    public function tapActivity(Activity $activity, string $eventName)
    {

        $activity->causer_type = get_class(Auth::guard(Helper::getGuard())->user());
        $activity->causer_id = Helper::getUserId();
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


    public function admin_profile()
    {
        return $this->hasOne(AdminProfile::class, 'admin_id');
    }

    public function user_detail()
    {
        return $this->hasOne(AdminProfile::class, 'admin_id');
    }

    public function leaves()
    {
        return $this->morphMany(Leave::class,'leaveable');
    }
    public function activities()
    {
        return $this->morphMany(Activity::class,'causer');
    }

    public function timezone()
    {
       return $this->admin_profile()->timezone;
    }
}
