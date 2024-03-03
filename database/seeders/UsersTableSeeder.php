<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Owner User
        DB::table('users')->insert([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'owner',
        ]);

        // Manager User
        DB::table('users')->insert([
            'name' => 'Manager User',
            'username' => 'manager',
            'email' => 'manager@example.com',
            'password' => Hash::make('managerpassword'),
            'role' => 'manager',
        ]);

        // Cashier User
        DB::table('users')->insert([
            'name' => 'Cashier User',
            'username' => 'cashier',
            'email' => 'cashier@example.com',
            'password' => Hash::make('cashierpassword'),
            'role' => 'cashier',
        ]);

        // Add more users as needed
    }
}
