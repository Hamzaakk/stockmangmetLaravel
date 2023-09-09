<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\StockEnier;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Auth;

class stockPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(GenericUser $user)
    {
        // $user = Auth::id();
        // $user = Profile::find($user);
      
            // return $user->isAdmin();
        
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StockEnier  $stockEnier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, StockEnier $stockEnier)
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StockEnier  $stockEnier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, StockEnier $stockEnier)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StockEnier  $stockEnier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, StockEnier $stockEnier)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StockEnier  $stockEnier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, StockEnier $stockEnier)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StockEnier  $stockEnier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, StockEnier $stockEnier)
    {
        //
    }
}
