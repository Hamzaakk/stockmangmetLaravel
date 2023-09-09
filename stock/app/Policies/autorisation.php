<?php

namespace App\Policies;

use App\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class autorisation
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function isAdminn()
    {
        $user = Profile::find(auth()->id()); 
        return $user->isAdmin() || $user->isGestionnaire();

    }
}
