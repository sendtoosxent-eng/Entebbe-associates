<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin.faqs.index', [
            'items' => Faq::orderBy('order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.faqs.form', ['item' => new Faq()]);
    }

    public function store(Request $request)
    {
        Faq::create($this->validated($request));

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ created.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.form', ['item' => $faq]);
    }

    public function update(Request $request, Faq $faq)
    {
        $faq->update($this->validated($request));

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ updated.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back()->with('status', 'FAQ deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]) + ['is_active' => $request->boolean('is_active')];
    }
}
