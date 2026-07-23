<?php

namespace Database\Seeders;

use App\Models\FeaturedProject;
use Illuminate\Database\Seeder;

class FeaturedProjectSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'photo_label' => 'PHOTO — Iraq network site',
                'photo_src' => '/images/projects/iraq-network-site.jpg',
                'title' => 'Iraq Nationwide Managed Services',
                'description' => 'NOC, field maintenance, core operations, and Level 2 support delivered at national scale since 2010.',
                'href' => '/projects#iraq-nationwide-managed-services',
            ],
            [
                'photo_label' => 'PHOTO — Kuwait NOC operations',
                'photo_src' => '/images/projects/kuwait-rollout-crew.jpg',
                'title' => 'Kuwait Managed Services Program',
                'description' => 'Managed services, NOC, and field operations supporting STC, Ooredoo, and Zain since 2009.',
                'href' => '/projects#kuwait-managed-services-program',
            ],
            [
                'photo_label' => 'PHOTO — turnkey site build, multi-country',
                'photo_src' => '/images/projects/turnkey-network-deployment.jpg',
                'title' => 'Full Turnkey Network Deployment Program',
                'description' => 'FTK, civil works, towers, and site build delivered across multiple countries since 2012.',
                'href' => '/projects#full-turnkey-network-deployment-program',
            ],
        ];

        foreach ($items as $i => $item) {
            FeaturedProject::updateOrCreate(
                ['title' => $item['title']],
                array_merge($item, ['sort_order' => $i]),
            );
        }
    }
}
