<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\PracticeArea;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\TrackRecord;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'settings' => Setting::pluck('value', 'key'),
            'practiceAreas' => PracticeArea::active()->get(),
            'teamMembers' => TeamMember::active()->get(),
            'trackRecords' => TrackRecord::active()->get(),
            'testimonials' => Testimonial::active()->get(),
            'blogPosts' => BlogPost::active()->orderByDesc('published_date')->get(),
            'faqs' => Faq::active()->get(),
        ]);
    }

    public function article(BlogPost $blogPost)
    {
        abort_unless($blogPost->is_active, 404);

        return view('article', [
            'post' => $blogPost,
            'settings' => Setting::pluck('value', 'key'),
        ]);
    }
}
