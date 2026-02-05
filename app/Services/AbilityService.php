<?php

namespace App\Services;
use App\Models\User;

class AbilityService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    protected array $abilities = [
        'admin' => [
            'create-meeting',
            'create-agenda-item',
            'create-resolution',
            'view-report',
        ],
        'owner' => [
            'vote',
            'view-report',
        ],
        'auditor' => [
            'view-report',
        ],
    ];

    public function can(User $user, string $ability): bool
    {
        $role = $user->role?->name;

        if (! $role) {
            return false;
        }

        return in_array($ability, $this->abilities[$role] ?? []);
    }
}

