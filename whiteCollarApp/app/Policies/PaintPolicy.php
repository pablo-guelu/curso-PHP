<?php

namespace App\Policies;

use App\Models\Paint;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaintPolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Paint $paint)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->hasRole('admin') == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Paint $paint)
    {
        if ($user->hasRole('admin') == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Paint $paint)
    {
        if ($user->hasRole('admin')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Paint $paint)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Paint $paint)
    {
        //
    }

    public function deleteAll(User $user)
    {
        if ($user->hasRole('admin') == 'admin') {
            return true;
        } else {
            return false;
        }
    }
}
