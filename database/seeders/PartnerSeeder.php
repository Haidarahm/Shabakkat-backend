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
            ['name' => 'Alfa', 'logo_src' => '/images/logo/alfa.jpg'],
            ['name' => 'ATC', 'logo_src' => '/images/logo/atc.jpg'],
            ['name' => 'Azady', 'logo_src' => '/images/logo/Azady.webp'],
            ['name' => 'Celtel', 'logo_src' => '/images/logo/celtel-seeklogo.webp'],
            ['name' => 'Cummins', 'logo_src' => '/images/logo/cummins.jpg'],
            ['name' => 'Daikin', 'logo_src' => '/images/logo/daikin.jpg'],
            ['name' => 'EEMC', 'logo_src' => '/images/logo/eemc.webp'],
            ['name' => 'Enviro', 'logo_src' => '/images/logo/enviro.jpg'],
            ['name' => 'Ericsson', 'logo_src' => '/images/logo/Ericsson.webp'],
            ['name' => 'GO', 'logo_src' => '/images/logo/go-etihad-atheeb.jpg'],
            ['name' => 'GTE', 'logo_src' => '/images/logo/GTE_logo.webp'],
            ['name' => 'Huawei', 'logo_src' => '/images/logo/huawei-logo.webp'],
            ['name' => 'IHS', 'logo_src' => '/images/logo/ihs-logo.webp'],
            ['name' => 'IPT PowerTech', 'logo_src' => '/images/logo/ipt-powertech.webp'],
            ['name' => 'Mitas', 'logo_src' => '/images/logo/Mitas.webp'],
            ['name' => 'Nokia', 'logo_src' => '/images/logo/nokia-seeklogo.webp'],
            ['name' => 'Ooredoo', 'logo_src' => '/images/logo/Ooredoo.webp'],
            ['name' => 'Oracle', 'logo_src' => '/images/logo/oracle.webp'],
            ['name' => 'Rogers', 'logo_src' => '/images/logo/rogers.jpg'],
            ['name' => 'STC', 'logo_src' => '/images/logo/STC.webp'],
            ['name' => 'TNSS', 'logo_src' => '/images/logo/TNSS.webp'],
            ['name' => 'Vodafone', 'logo_src' => '/images/logo/vodafone.jpg'],
            ['name' => 'Zain', 'logo_src' => '/images/logo/zain.jpg'],
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
