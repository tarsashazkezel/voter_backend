<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Resolution;
use App\Models\Vote;
use App\Services\VoteService;

class VoteController extends Controller
{
    public function store(Request $request, Resolution $resolution)
    {
        //  Policy ellenőrzés
        $this->authorize('vote', $resolution);

        // 2 Validáció
        $validated = $request->validate([
            'vote' => 'required|in:yes,no,abstain',
        ]);

        // 3️⃣ Szavazat mentése
        Vote::create([
            'user_id' => auth()->id(),
            'resolution_id' => $resolution->id,
            'vote' => $validated['vote'],
        ]);

        return response()->json([
            'message' => 'Szavazat rögzítve.'
        ], 201);
    }

    public function result(Resolution $resolution, VoteService $voteService)
    {
        // 4️⃣ Eredmény kiszámítása
        return response()->json(
            $voteService->calculateResult($resolution)
        );
    }
}
