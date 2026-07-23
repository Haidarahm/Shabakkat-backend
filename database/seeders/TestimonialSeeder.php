<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'quote' => 'Zain KSA always found Shabakkat a reliable and committed partner with a wide range of engineering services, great dedication, and high-level knowledge of different vendor equipment.',
                'author' => 'Ismail Fikree',
                'role' => 'COO, Zain KSA',
                'color' => 'cyan',
            ],
            [
                'quote' => 'Certificate of merit for professional working and excellent management on the Asiacell MW Swap project — with "0 accidents" recorded across the final three months of implementation.',
                'author' => 'Hao Song',
                'role' => 'Iraq D&S Representative, Huawei Technologies',
                'color' => 'red',
            ],
            [
                'quote' => 'Shabakkat proved to always be a trusted and committed partner... providing a wide range of successful services to Zain — Full Turnkey, Program Management, Technical Audit and Benchmarking.',
                'author' => 'Khaled A. Al-Hajeri',
                'role' => 'Group CTO, Zain Group',
                'color' => 'red',
            ],
            [
                'quote' => 'The skills, attitude, and dedication displayed by the FTK teams were excellent and well recognized during delivery of Zain Full Turnkey projects in Iraq.',
                'author' => 'Tamer Elkaffas',
                'role' => 'Director of PMO, Ericsson',
                'color' => 'red',
            ],
            [
                'quote' => 'We appreciate the special efforts made during the critical security situation in Al-Anbar, maintaining network continuity to serve customers with continuous success.',
                'author' => 'Mohammed Al Charchafchi',
                'role' => 'Acting CEO, Zain Iraq',
                'color' => 'cyan',
            ],
        ];

        foreach ($testimonials as $i => $testimonial) {
            Testimonial::updateOrCreate(
                ['author' => $testimonial['author'], 'role' => $testimonial['role']],
                array_merge($testimonial, ['sort_order' => $i]),
            );
        }
    }
}
