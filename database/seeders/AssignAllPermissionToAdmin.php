<?php

namespace Database\Seeders;

use App\Models\admin\Admin;
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
        $admins = Admin::where('type',Role::$admin)->get();
        foreach($admins as $admin){
            $admin->syncPermissions(Permission::where('guard_name', Role::$admin)->pluck('name'));
        }
    }
}
