<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionName extends Model
{
    use HasFactory;
    public static $customer = 'customer';
    public static $admin = 'admin';
    public static $employee = 'employee';
    public static $security = 'security_guard';

    protected $fillable = [
        'permission_name',
        'guard_name'
    ];
    public function permissions()
    {
        return $this->hasMany(Permission::class, 'permission_name_id', 'id');
    }

    public static function scopeIsActiveAdminRole($query){
        return Role::where('is_active',true)->where('created_by',Auth::guard('admin')->user()->id ?? '')->where('guard_name',PermissionName::$admin);
    }
    public static function scopeIsActiveCustomerRole($query){
        return Role::where('is_active',true)->where('created_by',Auth::guard('customer')->user()->id ?? '')->where('guard_name',PermissionName::$customer);
    }
}
