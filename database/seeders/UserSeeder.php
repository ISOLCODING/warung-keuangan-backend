<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Warung',
            'email' => 'admin@warung.com',
            'password' => Hash::make('password123'),
            'phone' => '081234567890',
        ]);
        $admin->assignRole('admin');

        $kasir = User::create([
            'name' => 'Kasir Warung',
            'email' => 'kasir@warung.com',
            'password' => Hash::make('password123'),
            'phone' => '081234567891',
        ]);
        $kasir->assignRole('kasir');
    }
}
