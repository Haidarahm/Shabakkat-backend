<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            ['name' => 'Airtel', 'logo_src' => '/images/logo/airtel.webp'],
            ['name' => 'Alcatel-Lucent', 'logo_src' => '/images/logo/alcatel-lucent.webp'],
            ['name' => 'Azady', 'logo_src' => '/images/logo/Azady.webp'],
            ['name' => 'Celtel', 'logo_src' => '/images/logo/celtel-seeklogo.webp'],
            ['name' => 'EEMC', 'logo_src' => '/images/logo/eemc.webp'],
            ['name' => 'Ericsson', 'logo_src' => '/images/logo/Ericsson.webp'],
            ['name' => 'GTE', 'logo_src' => '/images/logo/GTE_logo.webp'],
            ['name' => 'Huawei', 'logo_src' => '/images/logo/huawei-logo.webp'],
            ['name' => 'IHS', 'logo_src' => '/images/logo/ihs-logo.webp'],
            ['name' => 'IPT PowerTech', 'logo_src' => '/images/logo/ipt-powertech.webp'],
            ['name' => 'Mitas', 'logo_src' => '/images/logo/Mitas.webp'],
            ['name' => 'Nokia', 'logo_src' => '/images/logo/nokia-seeklogo.webp'],
            ['name' => 'Ooredoo', 'logo_src' => '/images/logo/Ooredoo.webp'],
            ['name' => 'Oracle', 'logo_src' => '/images/logo/oracle.webp'],
            ['name' => 'STC', 'logo_src' => '/images/logo/STC.webp'],
            ['name' => 'TNSS', 'logo_src' => '/images/logo/TNSS.webp'],
            ['name' => 'ZTE', 'logo_src' => '/images/logo/ZTE.webp'],
        ];

        foreach ($partners as $i => $partner) {
            Partner::updateOrCreate(
                ['name' => $partner['name']],
                array_merge($partner, ['sort_order' => $i]),
            );
        }
    }
}
