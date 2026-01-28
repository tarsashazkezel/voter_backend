<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

class AgendaItemController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'meeting_id' => 'required|exists:meetings,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        return AgendaItem::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $agendaItem->update($request->only(['title','description']));
        return $agendaItem;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agendaItem->delete();
        return response()->noContent();
    }
}
