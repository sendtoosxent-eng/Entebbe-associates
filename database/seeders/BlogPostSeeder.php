<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Understanding the New Land Act Amendments: What Property Owners in Uganda Need to Know',
                'category' => 'Land Law',
                'excerpt' => "The recent amendments to Uganda's Land Act introduce significant changes affecting both individual landowners and corporate entities. From revised procedures for title transfers to new protections for customary land rights, we break down what these changes mean for you.",
                'image' => 'images/slider2.jpeg',
                'author_name' => 'Robert Mugisha',
                'published_date' => '2025-06-02',
                'read_time' => '8 min read',
                'is_featured' => true,
            ],
            [
                'title' => 'Company Registration in Uganda: A Step-by-Step Guide for Entrepreneurs',
                'category' => 'Corporate',
                'excerpt' => 'A practical walkthrough of registering a company in Uganda, from name reservation to URSB incorporation.',
                'image' => 'images/slider1.jpeg',
                'author_name' => 'Kilumira Jonathan',
                'published_date' => '2025-05-18',
                'read_time' => '5 min read',
                'is_featured' => false,
            ],
            [
                'title' => "Inheritance Rights in Uganda: Protecting Your Family's Future",
                'category' => 'Family Law',
                'excerpt' => 'What Ugandan succession law says about inheritance, and steps families can take to avoid disputes.',
                'image' => 'images/promise.jpeg',
                'author_name' => 'Kisitu Sharif',
                'published_date' => '2025-05-05',
                'read_time' => '6 min read',
                'is_featured' => false,
            ],
            [
                'title' => "Uganda's Oil Sector: Legal Challenges Facing Foreign Investors in 2025",
                'category' => 'Oil & Gas',
                'excerpt' => "An analysis of regulatory frameworks, contract risks, and compliance obligations for companies entering Uganda's growing extractive sector.",
                'image' => 'images/law-firm.jpg',
                'author_name' => 'Kilumira Jonathan',
                'published_date' => '2025-04-22',
                'read_time' => '6 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'How to Enforce a Court Judgment in Uganda: A Practical Guide',
                'category' => 'Litigation',
                'excerpt' => 'Winning a case is only half the battle. We explain the enforcement mechanisms available under Ugandan law and how to recover what you are owed.',
                'image' => 'images/office.jpeg',
                'author_name' => 'Derrick Mugambwa',
                'published_date' => '2025-04-10',
                'read_time' => '5 min read',
                'is_featured' => false,
            ],
        ];

        foreach ($items as $i => $data) {
            BlogPost::updateOrCreate(
                ['title' => $data['title']],
                array_merge($data, ['order' => $i, 'is_active' => true])
            );
        }
    }
}
