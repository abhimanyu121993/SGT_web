<?php

namespace Database\Seeders;

use App\Models\PermissionName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = 'role';
        $perm = PermissionName::create(['permission_name'=>$permission,'guard_name'=>PermissionName::$admin]);
        if(isset($perm))
        {
            $permission = Permission::create(['name' => $permission, 'guard_name'=>$perm->guard_name,'permission_name_id' => $perm->id]);
            Permission::create( ['name' => $permission.'_create','guard_name'=>$perm->guard_name, 'permission_name_id' => $perm->id]);
            Permission::create( ['name' => $permission.'_read', 'guard_name'=>$perm->guard_name,'permission_name_id' => $perm->id]);
            Permission::create( ['name' => $permission.'_edit','guard_name'=>$perm->guard_name, 'permission_name_id' => $perm->id]);
            Permission::create( ['name' => $permission.'_delete','guard_name'=>$perm->guard_name, 'permission_name_id' => $perm->id]);
        }
    }
}
