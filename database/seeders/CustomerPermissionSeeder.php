<?php

namespace Database\Seeders;

use App\Models\PermissionName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CustomerPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ['role','permission','user','property'];
        foreach ($permissions as $permission) {
            $perm = PermissionName::firstOrCreate(['permission_name' => $permission, 'guard_name' => PermissionName::$customer],['permission_name' => $permission, 'guard_name' => PermissionName::$customer]);
            if (isset($perm)) {
                $permission = Permission::create(['name' => $permission, 'guard_name' => $perm->guard_name, 'permission_name_id' => $perm->id]);
                Permission::create(['name' => $permission->name . '_create', 'guard_name' => $perm->guard_name, 'permission_name_id' => $perm->id]);
                Permission::create(['name' => $permission->name . '_read', 'guard_name' => $perm->guard_name, 'permission_name_id' => $perm->id]);
                Permission::create(['name' => $permission->name . '_edit', 'guard_name' => $perm->guard_name, 'permission_name_id' => $perm->id]);
                Permission::create(['name' => $permission->name . '_delete', 'guard_name' => $perm->guard_name, 'permission_name_id' => $perm->id]);
            }
        }
    }
}
