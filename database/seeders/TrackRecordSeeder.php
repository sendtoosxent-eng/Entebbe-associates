<?php

namespace Database\Seeders;

use App\Models\TrackRecord;
use Illuminate\Database\Seeder;

class TrackRecordSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['Land Recovery', 'Church of Uganda Land Assets', 'Successful legal oversight in the recovery and title regularization of historic land holdings across several districts.', 'domain'],
            ['Arbitration', 'South Sudan Construction Dispute', 'Representing international contractors in multi-million dollar arbitration proceedings following cross-border infrastructure projects.', 'handshake'],
            ['Corporate Advisory', 'Financial Sector Restructuring', 'Strategic advisory for a leading regional bank on regulatory compliance and asset restructuring during M&A activity.', 'trending_up'],
        ];

        foreach ($items as $i => [$category, $title, $description, $icon]) {
            TrackRecord::updateOrCreate(
                ['title' => $title],
                ['category' => $category, 'description' => $description, 'icon' => $icon, 'order' => $i, 'is_active' => true]
            );
        }
    }
}
