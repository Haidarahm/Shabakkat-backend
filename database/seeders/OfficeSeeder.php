<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    public function run(): void
    {
        $offices = [
            [
                'name' => 'Shabakkat — Kuwait (Headquarters)',
                'role' => 'Headquarters',
                'color' => 'red',
                'address' => 'Kuwait — full address to be confirmed.',
                'phone' => '+965 XXX XXXX',
                'photo_src' => '/images/offices/kuwait.jpg',
                'is_headquarters' => true,
                'map_cx' => 1795.68,
                'map_cy' => 597.61,
            ],
            [
                'name' => 'Iraq',
                'role' => 'Regional office',
                'color' => 'cyan',
                'address' => 'Iraq Office — address to be confirmed.',
                'phone' => null,
                'photo_src' => '/images/offices/iraq.jpg',
                'is_headquarters' => false,
                'map_cx' => 1730.52,
                'map_cy' => 486.32,
            ],
            [
                'name' => 'Qatar',
                'role' => 'Regional office',
                'color' => 'red',
                'address' => 'Qatar Office — address to be confirmed.',
                'phone' => null,
                'photo_src' => '/images/offices/qatar.jpg',
                'is_headquarters' => false,
                'map_cx' => 1860.55,
                'map_cy' => 597.16,
            ],
            [
                'name' => 'Syria',
                'role' => 'Regional office',
                'color' => 'cyan',
                'address' => 'Syria Office — address to be confirmed.',
                'phone' => null,
                'photo_src' => '/images/offices/syria.jpg',
                'is_headquarters' => false,
                'map_cx' => 1643.84,
                'map_cy' => 485.33,
            ],
        ];

        foreach ($offices as $i => $office) {
            Office::updateOrCreate(
                ['name' => $office['name']],
                array_merge($office, ['sort_order' => $i]),
            );
        }
    }
}
