<?php

namespace App\Services;

use App\Models\Resolution;
use App\Models\User;
use App\Models\Vote;

class VoteService
{
    public function vote(User $user, Resolution $resolution, string $vote): Vote
    {
        return Vote::create([
            'user_id' => $user->id,
            'resolution_id' => $resolution->id,
            'vote' => $vote,
        ]);
    }
     public function calculateResult(Resolution $resolution): array{
        $votes = $resolution->votes()->with('user')->get();

        $yes = $no = $abstain = 0;

        foreach ($votes as $vote) {
            $weight = $vote->user->ownership_ratio;

            match ($vote->vote) {
                'yes' => $yes += $weight,
                'no' => $no += $weight,
                'abstain' => $abstain += $weight,
            };
        }

        $total = $yes + $no;

        return [
            'yes' => $yes,
            'no' => $no,
            'abstain' => $abstain,
            'total' => $total,
            'accepted' => $this->isAccepted($resolution, $yes, $no),
        ];
    }
    /**
     * Határozat elfogadása
     */
    private function isAccepted(Resolution $resolution, float $yes, float $no): bool
    {
        if ($resolution->requires_unanimous) {
            return $no == 0 && $yes > 0;
        }

        return $yes > $no;
    }

    /**
     * Szavazhat-e a felhasználó
     */
    public function canUserVote(User $user): bool
    {
        return $user->canVote();
    }
}
