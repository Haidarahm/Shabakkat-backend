<?php

namespace Database\Seeders;

use App\Models\Award;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    public function run(): void
    {
        $awards = [
            ['year' => 2019, 'label' => 'Huawei ME Core Partner Convention Award'],
            ['year' => 2021, 'label' => 'Talent Development Award'],
            ['year' => 2022, 'label' => 'Best Network Quality Assurance'],
            ['year' => null, 'label' => 'Best BSS Partner — Huawei Core Partner Convention'],
            ['year' => null, 'label' => 'DU–KV Datacenter Relocation Award — Nokia Siemens Networks'],
        ];

        foreach ($awards as $i => $award) {
            Award::updateOrCreate(
                ['label' => $award['label']],
                array_merge($award, ['sort_order' => $i]),
            );
        }
    }
}
