<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Street;

class StreetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $streets = [
            // Streets for Chichiri (assuming Chichiri has ID 1)
            ['name' => 'Poly Village', 'township_id' => 1],
            ['name' => 'Wandraz Club', 'township_id' => 1],
            ['name' => 'Roundabout', 'township_id' => 1],
            // Streets for Chilimba (assuming Chilimba has ID 3)
            ['name' => 'Likhubula', 'township_id' => 2],
            ['name' => 'General Vision', 'township_id' => 2],
            ['name' => 'Tsika', 'township_id' => 2],

            // Streets for Machinjiri (assuming Machinjiri has ID 2)
            ['name' => 'Area 6', 'township_id' => 3],
            ['name' => 'Area 4', 'township_id' => 3],
            ['name' => 'Area 10', 'township_id' => 3],

            // ['name' => 'Street 1-1-1', 'township_id' => 1],
            // ['name' => 'Street 1-1-2', 'township_id' => 1],
            // ['name' => 'Street 1-2-1', 'township_id' => 2],
            // ['name' => 'Street 2-1-1', 'township_id' => 3],
            // ['name' => 'Street 3-1-1', 'township_id' => 4],
        ];

        foreach ($streets as $street) {
            Street::create($street);
        }
    }
}
