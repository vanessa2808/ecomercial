<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function isAdmin()
    {
        return \Auth::user()->role_id === config('const.role.admin');
    }
}
