<?php

namespace App\Policies;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MeetingPolicy
{
    /**
     * Közgyűlés létrehozása
     */
    public function create(User $user): Response
    {
        return $user->isAdmin()
        ? Response::allow()
        : Response::deny('Közgyűlést csak a közös képviselő hozhat létre.');
    }

    /**
     * Közgyűlés módosítása
     */
    public function update(User $user, Meeting $meeting): bool
    {
        return $user->isAdmin();
    }

    /**
     * Közgyűlés megtekintése
     */
    public function view(User $user, Meeting $meeting): bool
    {
        return true;
    }

    /**
     * Közgyűlés törlése
     */
    public function delete(User $user, Meeting $meeting): bool
    {
        return $user->isAdmin();
    }
}
