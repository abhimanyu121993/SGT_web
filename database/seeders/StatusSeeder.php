<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'active',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'general',
        ]);
        Status::create([
            'name' => 'inactive',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'general',
        ]);
        Status::create([
            'name' => 'active',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'guard',
        ]);
        Status::create([
            'name' => 'inactive',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'guard',
        ]);
        Status::create([
            'name' => 'blocked',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'guard',
        ]);
        Status::create([
            'name' => 'verified',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'guard',
        ]);
        Status::create([
            'name' => 'pending',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'leave',
        ]);
        Status::create([
            'name' => 'Rejected',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'leave',
        ]);
        Status::create([
            'name' => 'Confirmed',
            'icon' => '',
            'color' => 'green',
            'bg_color'=>'white',
            'type'=>'leave',
        ]);
        Status::create([
            'name' => 'pending',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'report',
        ]);
        Status::create([
            'name' => 'Rejected',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'report',
        ]);
        Status::create([
            'name' => 'Confirmed',
            'icon' => '',
            'color' => 'green',
            'bg_color'=>'white',
            'type'=>'report',
        ]);
        // Guard Duty status Seeder accourding jobs.
        Status::create([
            'name' => 'pending',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'guard_duty',
        ]);
        Status::create([
            'name' => 'active',
            'icon' => '',
            'color' => 'green',
            'bg_color'=>'white',
            'type'=>'guard_duty',
        ]);
        Status::create([
            'name' => 'missed',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'guard_duty',
        ]);
        Status::create([
            'name' => 'completed',
            'icon' => '',
            'color' => 'Red',
            'bg_color'=>'white',
            'type'=>'guard_duty',
        ]);
        Status::create([
            'name' => 'leave',
            'icon' => '',
            'color' => 'green',
            'bg_color'=>'white',
            'type'=>'guard_duty',
        ]);
        }
}
