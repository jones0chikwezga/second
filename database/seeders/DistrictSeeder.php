<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            ['name' => 'Blantyre'],
            ['name' => 'Mzuzu'],
            ['name' => 'Karonga'],
        ];

        foreach ($districts as $district) {
            District::create($district);
        }
    }
}
