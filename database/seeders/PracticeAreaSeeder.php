<?php

namespace Database\Seeders;

use App\Models\PracticeArea;
use Illuminate\Database\Seeder;

class PracticeAreaSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['home_work', 'Land Law', 'Protecting rights, securing investments, and managing complex land conveyancing.'],
            ['gavel', 'Litigation', 'A formidable track record in civil and commercial dispute resolution.'],
            ['business_center', 'Corporate Law', 'Strategic advice for business formation, compliance, and restructuring.'],
            ['balance', 'Constitutional', 'Upholding fundamental rights and navigating public interest law.'],
            ['family_restroom', 'Family Law', 'Sensitive and professional handling of domestic relations and estate planning.'],
            ['account_balance_wallet', 'Taxation', 'Expert guidance on fiscal compliance and tax dispute resolution.'],
            ['manufacturing', 'Oil & Gas', 'Navigating the regulatory landscape of the extractive industries.'],
            ['assured_workload', 'Intellectual Property', 'Securing creative and industrial assets for innovators and businesses.'],
            ['real_estate_agent', 'Real Estate', 'End-to-end legal support for property acquisition, leasing, and development.'],
            ['groups', 'Labour Law', 'Employment contracts, disputes, and regulatory compliance for employers and employees.'],
            ['public', 'Immigration', 'Visas, work permits, and cross-border legal matters across East Africa.'],
        ];

        foreach ($items as $i => [$icon, $title, $description]) {
            PracticeArea::updateOrCreate(
                ['title' => $title],
                ['icon' => $icon, 'description' => $description, 'order' => $i, 'is_active' => true]
            );
        }
    }
}
