<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionName extends Model
{
    use HasFactory;

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'permission_name_id', 'id');
    }
}
