<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // general
            'site_name' => ['Entebbe Associated Advocates', 'general'],
            'site_tagline' => ['Defining Clarity & Results', 'general'],
            'logo' => ['', 'general'],
            'footer_text' => ['Defining Clarity, Responsiveness, and Results since 2024. Your premier legal partner in East Africa.', 'general'],
            'copyright_text' => ['All rights reserved. Registered Law Firm, Uganda.', 'general'],
            'nav_about' => ['About', 'navigation'],
            'nav_practice' => ['Practice Areas', 'navigation'],
            'nav_team' => ['Our Team', 'navigation'],
            'nav_reviews' => ['Reviews', 'navigation'],
            'nav_blog' => ['Blog', 'navigation'],
            'nav_contact' => ['Contact', 'navigation'],
            'nav_cta' => ['Consultation', 'navigation'],

            // hero
            'hero_badge' => ['Premier Legal Counsel', 'hero'],
            'hero_title' => ['Defining Clarity, Responsiveness, and Results.', 'hero'],
            'hero_subtitle' => ['A modern full-service law firm built to provide solution-oriented legal counsel to corporations, developers, and individuals across East Africa.', 'hero'],
            'hero_image' => ['images/law-firm.jpg', 'hero'],
            'hero_primary_cta' => ['Schedule a Consultation', 'hero'],
            'hero_secondary_cta' => ['View Practice Areas', 'hero'],

            // stats
            'stat_practice_areas' => ['11', 'stats'],
            'stat_practice_areas_label' => ['Practice Areas', 'stats'],
            'stat_cases_handled' => ['200', 'stats'],
            'stat_cases_handled_label' => ['Cases Handled', 'stats'],
            'stat_years_experience' => ['15', 'stats'],
            'stat_years_experience_label' => ['Years Combined Exp.', 'stats'],
            'stat_countries' => ['3', 'stats'],
            'stat_countries_label' => ['East African Countries', 'stats'],

            // about
            'about_title' => ['A Legacy of Technical Excellence', 'about'],
            'about_text1' => ['Established in May 2024, Entebbe Associated Advocates emerged as a response to the evolving legal landscape of Uganda and the wider region. Our firm is founded on the principles of precision and responsiveness, bridging the gap between traditional legal wisdom and modern business agility.', 'about'],
            'about_text2' => ['We are committed to providing technical excellence through a client-centered approach. Our team of advocates brings together years of experience in complex litigation, corporate restructuring, and high-value real estate transactions, ensuring every client receives tailored, strategic advice.', 'about'],
            'about_image1' => ['images/office.jpeg', 'about'],
            'about_image2' => ['images/slider1.jpeg', 'about'],
            'about_badge_country' => ['Uganda', 'about'],
            'about_badge_city' => ['Headquartered in Entebbe', 'about'],

            // mission / vision
            'mission_title' => ['Our Mission', 'mission_vision'],
            'mission_text' => ['To provide agile, high-precision legal solutions that empower our clients to navigate complex regulatory environments with confidence and clarity.', 'mission_vision'],
            'mission_tagline' => ['Strategic Excellence', 'mission_vision'],
            'vision_title' => ['Our Vision', 'mission_vision'],
            'vision_text' => ['To be the leading modern law firm in East Africa, recognized for setting the gold standard in responsiveness, integrity, and technical innovation.', 'mission_vision'],
            'vision_tagline' => ['Future-Ready Counsel', 'mission_vision'],

            // practice areas introduction
            'practice_title' => ['Specialized Legal Practice', 'practice_intro'],
            'practice_subtitle' => ['Comprehensive expertise across core legal disciplines designed for the modern enterprise.', 'practice_intro'],
            'practice_cta' => ['Discuss your matter', 'practice_intro'],

            // promise section
            'promise_image' => ['images/promise.jpeg', 'promise'],
            'promise_title' => ['Our Promise to Clients', 'promise'],
            'promise1_title' => ['Unwavering Integrity', 'promise'],
            'promise1_text' => ['Every action we take is rooted in the highest ethical standards of the legal profession.', 'promise'],
            'promise2_title' => ['Strategic Thinking', 'promise'],
            'promise2_text' => ["We don't just solve legal problems; we provide the strategic foresight needed for growth.", 'promise'],
            'promise3_title' => ['Agile Responsiveness', 'promise'],
            'promise3_text' => ['In high-stakes business, timing is everything. We respond with the urgency your case demands.', 'promise'],

            'track_record_title' => ['Leading Instructions & Track Record', 'track_record_intro'],
            'team_eyebrow' => ['The People Behind Your Case', 'team_intro'],
            'team_title' => ['Meet Our Team', 'team_intro'],
            'team_subtitle' => ['Distinguished advocates and professionals with the expertise, integrity, and dedication your matter deserves.', 'team_intro'],
            'team_cta' => ['Request a Consultation', 'team_intro'],
            'testimonials_eyebrow' => ['Client Voices', 'testimonials_intro'],
            'testimonials_title' => ['What Our Clients Say', 'testimonials_intro'],
            'blog_eyebrow' => ['Legal Insights', 'blog_intro'],
            'blog_title' => ['News & Articles', 'blog_intro'],
            'blog_subtitle' => ['Stay informed on legal developments shaping business and daily life across East Africa.', 'blog_intro'],
            'blog_browse_cta' => ['Browse Articles', 'blog_intro'],
            'newsletter_title' => ['Legal Insights Newsletter', 'blog_intro'],
            'newsletter_text' => ['Get our monthly digest of key legal developments in Uganda and East Africa — straight to your inbox.', 'blog_intro'],
            'newsletter_button' => ["Subscribe — It's Free", 'blog_intro'],
            'newsletter_note' => ['No spam. Unsubscribe anytime.', 'blog_intro'],
            'faq_eyebrow' => ['Common Questions', 'faq_intro'],
            'faq_title' => ['Frequently Asked Questions', 'faq_intro'],

            // contact
            'contact_eyebrow' => ['Get In Touch', 'contact'],
            'contact_title' => ['Schedule a Consultation', 'contact'],
            'contact_subtitle' => ['Tell us about your legal matter. Our team will review your inquiry and get back to you within 2 business hours.', 'contact'],
            'address' => ["Jab Apartments, Suite No.3, Plot 10241, Kabuusu Lweza Road\nSeguku-Ngobe, Opp. Ngobe Police Station\nEntebbe, Uganda", 'contact'],
            'phone' => ['+256 393 100 347', 'contact'],
            'email' => ['info@entebbeadvocates.com', 'contact'],
            'whatsapp' => ['+256393100347', 'contact'],
            'office_hours_weekday' => ['Mon – Fri: 8:00 AM – 6:00 PM', 'contact'],
            'office_hours_saturday' => ['Saturday: 9:00 AM – 1:00 PM', 'contact'],
            'office_hours_note' => ['Emergency legal support available 24/7.', 'contact'],
            'office_hours_title' => ['Office Hours', 'contact'],
            'contact_submit_label' => ['Send Message', 'contact'],
            'contact_success_title' => ['Message Sent!', 'contact'],
            'contact_success_text' => ['Thank you for reaching out. We will review your inquiry and get back to you within 2 business hours.', 'contact'],
            'privacy_note' => ['By submitting, you agree to our privacy policy. Your information is strictly confidential.', 'contact'],
        ];

        foreach ($settings as $key => [$value, $group]) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value, 'group' => $group]);
        }
    }
}
