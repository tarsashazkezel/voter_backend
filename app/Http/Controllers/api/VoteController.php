<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use App\Models\Resolution;
use App\Models\Vote;
use App\Services\VoteService;

class VoteController extends Controller
{
    public function __construct(
        protected VoteService $service
    ) {}

    public function store(Request $request, Resolution $resolution)
    {
        $this->authorize('vote', $resolution);

        return $this->service->vote(
            auth()->user(),
            $resolution,
            $request->vote
        );
    }

    public function result(Resolution $resolution)
    {
        return response()->json(
            $this->service->calculateResult($resolution)
        );
    }
}
