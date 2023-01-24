<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public static $admin='admin',$sub_admin='sub-admin';
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
}

