<?php

namespace App\Services;

use App\Models\Meeting;

class MeetingService
{
    public function index()
    {
        return Meeting::with('creator')->get();
    }

    public function create(array $data): Meeting
    {
        return Meeting::create($data);
    }

    public function show(Meeting $meeting): Meeting
    {
        return $meeting->load([
            'creator',
            'agendaItems.resolutions.votes.user',
        ]);
    }

    public function update(Meeting $meeting, array $data): Meeting
    {
        $meeting->update($data);
        return $meeting;
    }

    public function delete(Meeting $meeting): void
    {
        $meeting->delete();
    }

}
