<?php

namespace App\Http\Controllers\api;

use App\Models\AgendaItem;
use App\Services\AgendaItemService;
use Illuminate\Http\Request;

class AgendaItemController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        protected AgendaItemService $service
    ) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AgendaItem $agendaItem)
    {
        return $this->service->update($agendaItem, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgendaItem $agendaItem)
    {
        $this->service->delete($agendaItem);
        return response()->noContent();
    }
}
