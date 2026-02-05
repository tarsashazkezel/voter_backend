<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Resolution;
use App\Services\ResolutionService;

class ResolutionController
{
    public function __construct(
        protected ResolutionService $service
    ) {}

    public function index(){
        return $this->service->index();
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show(Resolution $resolution)
    {
        return $this->service->show($resolution);
    }

    public function update(Request $request, Resolution $resolution)
    {
        return $this->service->update($resolution, $request->all());
    }

    public function destroy(Resolution $resolution)
    {
        $this->service->delete($resolution);
        return response()->noContent();
    }
}
