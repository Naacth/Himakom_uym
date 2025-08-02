<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'username' => 'fariz',
            'password' => Hash::make('fariz ganteng'),
            'name' => 'Fariz Admin',
            'email' => 'fariz@himakom.com',
            'role' => 'admin',
            'is_active' => true,
        ]);

        Admin::create([
            'username' => 'superadmin',
            'password' => Hash::make('superadmin123'),
            'name' => 'Super Admin',
            'email' => 'superadmin@himakom.com',
            'role' => 'superadmin',
            'is_active' => true,
        ]);
    }
}
