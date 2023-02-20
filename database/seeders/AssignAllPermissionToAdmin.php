<?php

namespace Database\Seeders;

use App\Models\admin\Admin;
use App\Models\PermissionName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignAllPermissionToAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = Admin::where('type',PermissionName::$admin)->get();
        foreach($admins as $admin){
            $admin->syncPermissions(Permission::where('guard_name', PermissionName::$admin)->pluck('name'));
        }
    }
}
