<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'slug' => 'engineering-services',
                'index_label' => '01',
                'title' => 'Engineering Services',
                'description' => 'Our engineering teams deliver comprehensive infrastructure solutions, combining technical expertise, disciplined execution, and operational excellence to build resilient, scalable, and future-ready digital infrastructure.',
            ],
            [
                'slug' => 'pmo-project-delivery',
                'index_label' => '02',
                'title' => 'PMO & Project Delivery',
                'description' => 'Our PMO services establish the governance, structure, and leadership required to successfully deliver complex infrastructure programs, ensuring alignment with business objectives while maintaining control over cost, schedule, quality, risk, and performance.',
            ],
            [
                'slug' => 'technical-advisory',
                'index_label' => '03',
                'title' => 'Technical Advisory',
                'description' => 'Our advisory services help organizations make informed investment, technology, and infrastructure decisions by combining engineering knowledge with practical industry experience and independent technical assessment.',
            ],
            [
                'slug' => 'telecom-products-infrastructure',
                'index_label' => '04',
                'title' => 'Telecom Products & Infrastructure Solutions',
                'description' => 'Supplying the tower, energy, passive infrastructure, network equipment, and accessories required to build, power, and sustain critical telecommunications sites.',
            ],
        ];

        foreach ($categories as $i => $category) {
            ServiceCategory::updateOrCreate(
                ['slug' => $category['slug']],
                array_merge($category, ['sort_order' => $i]),
            );
        }
    }
}
