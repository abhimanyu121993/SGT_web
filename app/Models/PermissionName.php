<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

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
}
