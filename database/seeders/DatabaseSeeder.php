<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ServiceCategorySeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            FeaturedProjectSeeder::class,
            IndustrySeeder::class,
            PartnerSeeder::class,
            CertificationSeeder::class,
            OfficeSeeder::class,
            StatSeeder::class,
            FaqSeeder::class,
            TestimonialSeeder::class,
            AwardSeeder::class,
            OpeningSeeder::class,
        ]);
    }
}
