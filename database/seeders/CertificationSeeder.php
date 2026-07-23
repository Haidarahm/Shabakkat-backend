<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    public function run(): void
    {
        $certifications = [
            ['code' => 'ISO 9001', 'title' => 'ISO 9001 Quality Management System', 'logo_src' => '/images/certs/iso-9001.svg'],
            ['code' => 'ISO 14001', 'title' => 'ISO 14001 Environmental Management System', 'logo_src' => '/images/certs/iso-14001.svg'],
            ['code' => 'ISO 45001', 'title' => 'ISO 45001 Occupational Health & Safety Management System', 'logo_src' => '/images/certs/iso-45001.svg'],
            ['code' => 'ISO/IEC 27001', 'title' => 'ISO/IEC 27001 Information Security Management System', 'logo_src' => '/images/certs/iso-27001.svg'],
            ['code' => 'TM Forum', 'title' => 'TM Forum Career Certified', 'logo_src' => '/images/certs/tm-forum.svg'],
        ];

        foreach ($certifications as $i => $certification) {
            Certification::updateOrCreate(
                ['code' => $certification['code']],
                array_merge($certification, ['sort_order' => $i]),
            );
        }
    }
}
