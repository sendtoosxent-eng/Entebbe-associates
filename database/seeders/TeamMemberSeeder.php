<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Derrick Mugambwa',
                'badge' => 'Lead Attorney',
                'subtitle' => 'Advocate · High Court of Uganda',
                'icon' => 'gavel',
                'bio' => "Derrick leads the firm with over a decade of experience in complex litigation, land law, and corporate advisory. A respected figure in Uganda's legal community, he has appeared before the High Court and Court of Appeal, and represented clients in international arbitration across East Africa.",
                'photo' => 'images/derrick.jpeg',
                'stat1_value' => '10+', 'stat1_label' => 'Yrs Exp.',
                'stat2_value' => '120+', 'stat2_label' => 'Cases',
                'stat3_value' => '5', 'stat3_label' => 'Countries',
                'expertise' => ['Land Law', 'Litigation', 'Corporate Advisory', 'Arbitration', 'Constitutional Law'],
            ],
            [
                'name' => 'Kilumira Jonathan',
                'badge' => 'Attorney',
                'subtitle' => 'Attorney · Corporate & Extractive Industries',
                'icon' => 'business_center',
                'bio' => 'Jonathan advises on oil & gas regulatory matters, company formation, and cross-border M&A transactions. He has represented clients in multi-million dollar arbitration proceedings across East Africa, bringing sharp commercial instinct to every instruction.',
                'photo' => 'images/kilumira.jpeg',
                'stat1_value' => '7+', 'stat1_label' => 'Yrs Exp.',
                'stat2_value' => '80+', 'stat2_label' => 'Deals',
                'stat3_value' => '$M', 'stat3_label' => 'Arbitration',
                'expertise' => ['Corporate Law', 'Oil & Gas', 'M&A Transactions', 'Arbitration', 'Regulatory Compliance'],
            ],
            [
                'name' => 'Patrick Murungi Apuuli',
                'badge' => 'Attorney',
                'subtitle' => 'Attorney · Litigation & Land Law',
                'icon' => 'balance',
                'bio' => "Patrick brings methodical precision to litigation and land law matters. With a strong record before Uganda's courts, he handles complex land conveyancing, title disputes, and commercial litigation, advocating tenaciously for clients at every stage of proceedings.",
                'photo' => 'images/patrick.jpeg',
                'stat1_value' => '6+', 'stat1_label' => 'Yrs Exp.',
                'stat2_value' => '70+', 'stat2_label' => 'Cases',
                'stat3_value' => '3', 'stat3_label' => 'Specialisms',
                'expertise' => ['Litigation', 'Land Law', 'Real Estate', 'Civil Disputes', 'Contract Law'],
            ],
            [
                'name' => 'Kisitu Sharif',
                'badge' => 'Attorney',
                'subtitle' => 'Attorney · Family & Constitutional Law',
                'icon' => 'assured_workload',
                'bio' => "Kisitu specialises in family and constitutional law, offering sensitive yet decisive legal counsel across domestic relations, inheritance disputes, and public interest litigation. His client-first philosophy has earned him a strong reputation for favourable outcomes.",
                'photo' => 'images/kisitu.jpeg',
                'stat1_value' => '5+', 'stat1_label' => 'Yrs Exp.',
                'stat2_value' => '60+', 'stat2_label' => 'Cases',
                'stat3_value' => '4', 'stat3_label' => 'Specialisms',
                'expertise' => ['Family Law', 'Constitutional Law', 'Taxation', 'Immigration', 'Labour Law'],
            ],
            [
                'name' => 'Shamira Nansubuga',
                'badge' => 'Office Administrator',
                'subtitle' => 'Office Administrator & Client Relations',
                'icon' => 'manage_accounts',
                'bio' => 'Shamira is the operational backbone of Entebbe Associated Advocates. She coordinates case management, client onboarding, and internal administration across all departments, ensuring every client receives a seamless, professional experience from first contact through to case closure.',
                'photo' => 'images/shami.jpeg',
                'stat1_value' => '5+', 'stat1_label' => 'Yrs Exp.',
                'stat2_value' => '50+', 'stat2_label' => 'Cases Mgd.',
                'stat3_value' => '3', 'stat3_label' => 'Departments',
                'expertise' => ['Client Relations', 'Case Management', 'Office Operations', 'Scheduling', 'Records Management'],
            ],
        ];

        foreach ($items as $i => $data) {
            TeamMember::updateOrCreate(
                ['name' => $data['name']],
                array_merge($data, ['order' => $i, 'is_active' => true])
            );
        }
    }
}
