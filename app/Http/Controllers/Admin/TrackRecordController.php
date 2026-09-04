<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrackRecord;
use Illuminate\Http\Request;

class TrackRecordController extends Controller
{
    public function index()
    {
        return view('admin.track-records.index', [
            'items' => TrackRecord::orderBy('order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.track-records.form', ['item' => new TrackRecord()]);
    }

    public function store(Request $request)
    {
        TrackRecord::create($this->validated($request));

        return redirect()->route('admin.track-records.index')->with('status', 'Track record created.');
    }

    public function edit(TrackRecord $trackRecord)
    {
        return view('admin.track-records.form', ['item' => $trackRecord]);
    }

    public function update(Request $request, TrackRecord $trackRecord)
    {
        $trackRecord->update($this->validated($request));

        return redirect()->route('admin.track-records.index')->with('status', 'Track record updated.');
    }

    public function destroy(TrackRecord $trackRecord)
    {
        $trackRecord->delete();

        return back()->with('status', 'Track record deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'category' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]) + ['is_active' => $request->boolean('is_active')];
    }
}
