<?php

namespace Database\Seeders;

use App\Models\PermissionName;
use App\Models\SecurityGuard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AssignAllPermissionToSecurityGuard extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $securities = SecurityGuard::get();
        foreach($securities as $security){
            $security->syncPermissions(Permission::where('guard_name', PermissionName::$security)->pluck('name'));
        }
    }
}
