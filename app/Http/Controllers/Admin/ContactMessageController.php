<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        return view('admin.contact-messages.index', [
            'items' => ContactMessage::latest()->paginate(20),
        ]);
    }

    public function show(ContactMessage $contactMessage)
    {
        if (! $contactMessage->is_read) {
            $contactMessage->update(['is_read' => true]);
        }

        return view('admin.contact-messages.show', ['item' => $contactMessage]);
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return back()->with('status', 'Message deleted.');
    }
}
