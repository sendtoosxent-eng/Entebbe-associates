<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PracticeArea;
use Illuminate\Http\Request;

class PracticeAreaController extends Controller
{
    public function index()
    {
        return view('admin.practice-areas.index', [
            'items' => PracticeArea::orderBy('order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.practice-areas.form', ['item' => new PracticeArea()]);
    }

    public function store(Request $request)
    {
        PracticeArea::create($this->validated($request));

        return redirect()->route('admin.practice-areas.index')->with('status', 'Practice area created.');
    }

    public function edit(PracticeArea $practiceArea)
    {
        return view('admin.practice-areas.form', ['item' => $practiceArea]);
    }

    public function update(Request $request, PracticeArea $practiceArea)
    {
        $practiceArea->update($this->validated($request));

        return redirect()->route('admin.practice-areas.index')->with('status', 'Practice area updated.');
    }

    public function destroy(PracticeArea $practiceArea)
    {
        $practiceArea->delete();

        return back()->with('status', 'Practice area deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'icon' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]) + ['is_active' => $request->boolean('is_active')];
    }
}
