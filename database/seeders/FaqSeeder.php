<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['How do I schedule a consultation?', 'You can schedule a consultation by filling out our contact form below, calling us directly at +256 393 100 347, or sending a WhatsApp message. We typically respond within 2 business hours and schedule initial consultations within 48 hours.'],
            ['What are your legal fees?', 'Our fees vary depending on the nature, complexity, and urgency of the matter. We offer transparent fee structures — fixed fees for standard matters and hourly rates for complex litigation. All fees are discussed and agreed upon at the initial consultation before work begins.'],
            ['Do you handle matters outside Uganda?', 'Yes. We regularly handle cross-border matters across East Africa, including Kenya, Tanzania, Rwanda, and South Sudan. For international matters, we work with a trusted network of correspondent lawyers to ensure seamless representation wherever our clients need us.'],
            ['How long does a typical land title transfer take?', 'A standard land title transfer in Uganda typically takes 4–8 weeks, depending on the completeness of documentation and responsiveness of the Uganda Registration Services Bureau (URSB). We actively follow up to ensure the process moves as efficiently as possible.'],
            ['Is my information kept confidential?', 'Absolutely. All client communications and case details are protected by attorney-client privilege and our strict internal confidentiality policy. We take data privacy seriously and will never share your information with third parties without your express consent.'],
        ];

        foreach ($items as $i => [$question, $answer]) {
            Faq::updateOrCreate(
                ['question' => $question],
                ['answer' => $answer, 'order' => $i, 'is_active' => true]
            );
        }
    }
}
