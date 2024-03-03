<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('medications')->insert([
            [
                'name' => 'Amoxicillin',
                'description' => 'Antibiotic used to treat a number of bacterial infections.',
                'quantity' => 100,
            ],
            [
                'name' => 'Ibuprofen',
                'description' => 'Used to reduce fever and treat pain or inflammation.',
                'quantity' => 200,
            ],
            [
                'name' => 'Loratadine',
                'description' => 'Antihistamine that reduces the effects of natural chemical histamine in the body.',
                'quantity' => 150,
            ],
        ]);

        // Add more medication entries as needed
    }
}

