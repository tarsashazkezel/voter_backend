<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Services\MeetingService;
use App\Services\MeetingReportService;
use Barryvdh\DomPDF\Facade\Pdf;

class MeetingController extends Controller
{

    public function __construct(protected MeetingService $service
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Meeting::class);

        // $data = $request->validate([
        //     'title' => 'required|string',
        //     'meeting_date' => 'required|date',
        //     'location' => 'required|string',
        // ]);
        return $this->service->create([
            'title' => $request->title,
            'meeting_date' => $request->meeting_date,
            'location' => $request->location,
            'created_by' => auth()->id(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Meeting $meeting)
    {
        return $this->service->show($meeting);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meeting $meeting)
    {
        $this->authorize('update', $meeting);

        return $this->service->update(
            $meeting,
            $request->only(['title','meeting_date','location'])
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meeting $meeting)
    {
        $this->authorize('delete', $meeting);

        $this->service->delete($meeting);
        return response()->noContent();
    }

    public function report(Meeting $meeting, MeetingReportService $m_r_service)
    {
        return response()->json($m_r_service->generate($meeting));
    }
    public function pdf(Meeting $meeting, MeetingReportService $reportService)
    {
        $report = $reportService->generate($meeting);

        return Pdf::loadView('reports.meeting', compact('report'))
            ->download('jegyzokonyv.pdf');
    }
}
