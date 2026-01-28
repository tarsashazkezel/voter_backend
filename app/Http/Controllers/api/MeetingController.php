<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

class MeetingController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Meeting::with('creator')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Meeting::class);

        $data = $request->validate([
            'title' => 'required|string',
            'meeting_date' => 'required|date',
            'location' => 'required|string',
        ]);
         return Meeting::create([
            ...$data,
            'created_by' => auth()->id(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $meeting->load(["creator",'agendaItems.resolutions.votes']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update', $meeting);

        $meeting->update($request->only(['title','meeting_date','location']));
        return $meeting;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', $meeting);

        $meeting->delete();
        return response()->noContent();
    }

    public function report(Meeting $meeting, MeetingReportService $service)
    {
        return response()->json($service->generate($meeting));
    }
}
