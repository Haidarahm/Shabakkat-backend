<?php

namespace Database\Seeders;

use App\Models\Stat;
use Illuminate\Database\Seeder;

class StatSeeder extends Seeder
{
    public function run(): void
    {
        $stats = [
            ['value' => 21, 'suffix' => '+', 'label' => 'Years Experience'],
            ['value' => 15, 'suffix' => null, 'label' => 'Countries'],
            ['value' => 900, 'suffix' => '+', 'label' => 'Professionals'],
            ['value' => 20, 'suffix' => '+', 'label' => 'Mobile Operators'],
            ['value' => 50, 'suffix' => 'M+', 'label' => 'Subscribers Managed'],
        ];

        foreach ($stats as $i => $stat) {
            Stat::updateOrCreate(
                ['label' => $stat['label']],
                array_merge($stat, ['sort_order' => $i]),
            );
        }
    }
}
