<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'phone_number' => '123456789',
                'gender' => 'male',
                'allergies' => 'None',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'phone_number' => '987654321',
                'gender' => 'female',
                'allergies' => 'Penicillin',
            ],
            [
                'name' => 'Emily Johnson',
                'email' => 'emilyjohnson@example.com',
                'phone_number' => '192837465',
                'gender' => 'female',
                'allergies' => 'Aspirin',
            ],
        ]);

        // Add more customer entries as needed
    }
}
