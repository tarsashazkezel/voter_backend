<?php

namespace App\Policies;

use App\Models\Resolution;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ResolutionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Resolution $resolution): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->isAdmin()?Response::allow():Response::deny('Nem jogosult szerepkörnek.');
    }

   public function vote(User $user, Resolution $resolution): Response
    {
        // Számvizsgáló nem szavazhat
        if (! $user->canVote()) {
            return Response::deny('Ez a szerepkör nem jogosult szavazásra.');
        }

        // Egy felhasználó csak egyszer szavazhat
        if($resolution->votes()->where('user_id', $user->id)->exists()){
            return Response::deny('Egy határozatra csak egyszer szavazhat.');
        }

        return Response::allow();
    }
}
