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

        }
}
