<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Township;

class TownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $townships = [
            ['name' => 'Chichiri', 'district_id' => 1],
            ['name' => 'Chirimba', 'district_id' => 1],
            ['name' => 'Machinjiri', 'district_id' => 1],
            
            // ['name' => 'Ma-high', 'district_id' => 3],
        ];

        foreach ($townships as $township) {
            Township::create($township);
        }
    }
}
