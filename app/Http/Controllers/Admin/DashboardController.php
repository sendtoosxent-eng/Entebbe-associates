<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\PracticeArea;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\TrackRecord;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'counts' => [
                'practice_areas' => PracticeArea::count(),
                'team_members' => TeamMember::count(),
                'track_records' => TrackRecord::count(),
                'testimonials' => Testimonial::count(),
                'blog_posts' => BlogPost::count(),
                'faqs' => Faq::count(),
                'unread_messages' => ContactMessage::where('is_read', false)->count(),
            ],
            'recentMessages' => ContactMessage::latest()->limit(5)->get(),
        ]);
    }
}
