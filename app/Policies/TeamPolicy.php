<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Team;

class TeamPolicy extends Policy
{
    public function update(User $user, Team $team)
    {
        // return $team->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Team $team)
    {
        return true;
    }
}
