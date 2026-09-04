<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'client_name' => 'David Kyambadde',
                'initials' => 'DK',
                'role_company' => 'Director, Kyambadde Holdings',
                'location' => 'Kampala, Uganda',
                'quote' => 'Entebbe Associated Advocates handled our land dispute with remarkable precision and speed. Robert Mugisha personally oversaw the case and kept us informed at every step. We recovered what was rightfully ours.',
                'rating' => 5,
                'practice_area' => 'Land Law & Recovery',
            ],
            [
                'client_name' => 'Amina Mohamed',
                'initials' => 'AM',
                'role_company' => 'Real Estate Developer, Nairobi',
                'location' => 'Nairobi, Kenya',
                'quote' => "As a foreign investor entering Uganda's real estate market, I needed a firm I could trust completely. Entebbe Associated Advocates navigated every regulatory hurdle efficiently. Truly world-class service.",
                'rating' => 5,
                'practice_area' => 'Real Estate & Investment Law',
            ],
            [
                'client_name' => 'Peter Okello',
                'initials' => 'PO',
                'role_company' => 'CEO, Lakeside Financial Group',
                'location' => 'Kampala, Uganda',
                'quote' => "We engaged the firm during a sensitive corporate restructuring. John Bosco's expertise in corporate law was indispensable. The team was responsive, thorough, and delivered beyond our expectations.",
                'rating' => 5,
                'practice_area' => 'Corporate Law & M&A',
            ],
        ];

        foreach ($items as $i => $data) {
            Testimonial::updateOrCreate(
                ['client_name' => $data['client_name']],
                array_merge($data, ['order' => $i, 'is_active' => true])
            );
        }
    }
}
