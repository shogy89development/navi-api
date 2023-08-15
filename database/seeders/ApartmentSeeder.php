<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load data from JSON file
        $data = json_decode(file_get_contents(database_path('seeds/list.json')), true);

        // Insert data into the apartments table
        foreach ($data as $apartment) {
            // Check if "floor" is numeric
            if (is_numeric($apartment['floor'])) {
                $apartment['floor'] = (string) $apartment['floor'];
            }
            
            DB::table('apartments')->insert($apartment);
        }
    }
}
