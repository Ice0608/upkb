<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'level' => 'admin',
        ]);

        // Create staff user
        User::create([
            'name' => 'Staff Member',
            'username' => 'staff',
            'password' => Hash::make('staff123'),
            'level' => 'staff',
        ]);
    }
}
