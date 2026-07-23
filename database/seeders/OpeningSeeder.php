<?php

namespace Database\Seeders;

use App\Models\Opening;
use Illuminate\Database\Seeder;

class OpeningSeeder extends Seeder
{
    public function run(): void
    {
        $openings = [
            ['title' => 'Senior Network Engineer', 'department' => 'Engineering Services', 'location' => 'Kuwait', 'type' => 'Full-time'],
            ['title' => 'PMO Program Manager', 'department' => 'PMO & Project Delivery', 'location' => 'Iraq', 'type' => 'Full-time'],
            ['title' => 'Technical Advisory Consultant', 'department' => 'Technical Advisory', 'location' => 'Kuwait', 'type' => 'Full-time'],
            ['title' => 'Field Maintenance Technician', 'department' => 'Managed Operations', 'location' => 'Iraq', 'type' => 'Full-time'],
        ];

        foreach ($openings as $i => $opening) {
            Opening::updateOrCreate(
                ['title' => $opening['title'], 'location' => $opening['location']],
                array_merge($opening, ['is_active' => true, 'sort_order' => $i]),
            );
        }
    }
}
