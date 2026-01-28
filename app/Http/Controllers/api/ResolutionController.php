<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

class ResolutionController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Resolution::class);

        $data = $request->validate([
            'agenda_item_id' => 'required|exists:agenda_items,id',
            'text' => 'required|string',
            'requires_unanimous' => 'boolean',
        ]);

        return Resolution::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         return $resolution->load('votes.user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
