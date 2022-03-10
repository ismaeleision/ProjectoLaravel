<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Inscripcion;
use Illuminate\Auth\Access\HandlesAuthorization;

class InscripcionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inscripcion  $Inscripcion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return ($user->role == 'organizador') || ($user->role == 'admin');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inscripcion  $Inscripcion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Inscripcion $inscripcion)
    {
        return ($user->id === $inscripcion->user->id) || ($user->role == 'admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inscripcion  $Inscripcion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Inscripcion $inscripcion)
    {
        return ($user->id === $inscripcion->user->id) || ($user->role == 'admin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inscripcion  $Inscripcion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inscripcion  $Inscripcion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Inscripcion $inscripcion)
    {
        //
    }
}
