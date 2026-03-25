<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['employee_ad_id' => 'superadmin'],
            [
                'password' => Hash::make('Admin@1234'),
                'user_type' => 'all',
                'is_active' => 1,
            ]
        );

        Admin::updateOrCreate(
            ['employee_ad_id' => 'admin1'],
            [
                'password' => Hash::make('Admin@1234'),
                'user_type' => 'custom',
                'is_active' => 1,
            ]
        );

        Admin::updateOrCreate(
            ['employee_ad_id' => 'kashif'],
            [
                'password' => Hash::make('Admin@1234'),
                'user_type' => 'custom',
                'is_active' => 1,
            ]
        );
    }
}

