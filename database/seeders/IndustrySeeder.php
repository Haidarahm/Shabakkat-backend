<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        $industries = [
            [
                'slug' => 'telecom-operators',
                'title' => 'Telecommunications Operators',
                'tagline' => 'Enabling the Future of Connectivity',
                'color' => 'red',
                'summary' => 'Telecommunications networks continue to evolve in response to growing demand, emerging technologies, and increasing customer expectations. Shabakkat supports mobile and fixed network operators in expanding capacity, modernizing infrastructure, enhancing operational resilience, and preparing for the next generation of digital connectivity.',
                'notable_names' => 'du, Ooredoo, Zain, STC',
                'focus_areas' => ['Network rollout & modernization', '24/7 managed services & NOC', 'Wireless & fixed networks', 'Engineering & technical services'],
                'relevant_services' => [
                    ['label' => 'Network Infrastructure & Deployment', 'href' => '/services/engineering-services#network-rollout'],
                    ['label' => 'Managed Operations', 'href' => '/services/engineering-services#managed-services'],
                    ['label' => 'Wireless & Fixed Networks', 'href' => '/services/engineering-services#wireless-fixed-networks'],
                ],
                'related_project_href' => '/projects#kuwait-managed-services-program',
            ],
            [
                'slug' => 'government',
                'title' => 'Government & Public Sector',
                'tagline' => 'Supporting National Digital Transformation',
                'color' => 'cyan',
                'summary' => 'Governments play a vital role in shaping the future of digital infrastructure through policy, regulation, and strategic investment. Shabakkat partners with ministries, public sector organizations, and telecommunications regulatory authorities to support national digital transformation, strengthen regulatory initiatives, enhance critical infrastructure, and enable secure, scalable, and future-ready public services.',
                'notable_names' => 'Ministries and public institutions',
                'focus_areas' => ['National digital transformation', 'PMO & governance', 'Technical advisory', 'Critical infrastructure'],
                'relevant_services' => [
                    ['label' => 'Technical Advisory', 'href' => '/services/technical-advisory#technical-advisory'],
                    ['label' => 'PMO & Project Delivery', 'href' => '/services/pmo-project-delivery#pmo-project-delivery'],
                ],
                'related_project_href' => '/projects#pmo-governance-transformation',
            ],
            [
                'slug' => 'data-centers',
                'title' => 'Data Centers',
                'tagline' => 'Building the Foundation of the Digital Economy',
                'color' => 'red',
                'summary' => 'As digital demand continues to accelerate, data centers have become the backbone of modern business and cloud services. Shabakkat supports the development, modernization, and expansion of resilient digital infrastructure that delivers high availability, operational efficiency, scalability, and long-term business continuity.',
                'notable_names' => 'Data center developers & operators',
                'focus_areas' => ['Data center infrastructure & fit-out', 'Critical power & cooling', 'Structured cabling', 'Disaster recovery infrastructure'],
                'relevant_services' => [
                    ['label' => 'Data Centers & Digital Infrastructure', 'href' => '/services/engineering-services#data-centers-digital-infrastructure'],
                    ['label' => 'Engineering & Technical Services', 'href' => '/services/engineering-services#engineering-technical-services'],
                ],
                'related_project_href' => '/projects#engineering-digital-infrastructure-expansion',
            ],
            [
                'slug' => 'enterprise',
                'title' => 'Enterprise',
                'tagline' => 'Empowering Business Through Digital Infrastructure',
                'color' => 'cyan',
                'summary' => 'Modern enterprises require resilient, secure, and scalable infrastructure to support growth, operational continuity, and digital transformation. Shabakkat partners with organizations across diverse industries to strengthen their technology foundations and enable sustainable business performance.',
                'notable_names' => 'LAN/WAN, data center & cloud clients',
                'focus_areas' => ['Data centers & digital infrastructure', 'Wireless & fixed networks', 'Technical advisory', 'Managed operations'],
                'relevant_services' => [
                    ['label' => 'Data Centers & Digital Infrastructure', 'href' => '/services/engineering-services#data-centers-digital-infrastructure'],
                    ['label' => 'Wireless & Fixed Networks', 'href' => '/services/engineering-services#wireless-fixed-networks'],
                    ['label' => 'Technical Advisory', 'href' => '/services/technical-advisory#technical-advisory'],
                    ['label' => 'Managed Operations', 'href' => '/services/engineering-services#managed-services'],
                ],
                'related_project_href' => null,
            ],
            [
                'slug' => 'energy-utilities',
                'title' => 'Energy & Utilities',
                'tagline' => 'Strengthening Critical Infrastructure',
                'color' => 'red',
                'summary' => 'Reliable communications and resilient infrastructure are essential to the continuity of energy and utility operations. Shabakkat supports organizations in modernizing critical infrastructure, improving operational resilience, and enabling secure, reliable communications that support essential services.',
                'notable_names' => 'Energy & utility operators',
                'focus_areas' => ['Critical infrastructure modernization', 'Network infrastructure', 'Operational resilience', 'Reliable communications'],
                'relevant_services' => [
                    ['label' => 'Network Infrastructure & Deployment', 'href' => '/services/engineering-services#network-rollout'],
                    ['label' => 'Engineering & Technical Services', 'href' => '/services/engineering-services#engineering-technical-services'],
                ],
                'related_project_href' => '/projects#full-turnkey-network-deployment-program',
            ],
        ];

        foreach ($industries as $i => $industry) {
            Industry::updateOrCreate(
                ['slug' => $industry['slug']],
                array_merge($industry, ['sort_order' => $i]),
            );
        }
    }
}
