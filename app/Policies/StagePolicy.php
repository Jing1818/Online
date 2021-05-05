<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Stage;

class StagePolicy extends Policy
{
    public function update(User $user, Stage $stage)
    {
        // return $stage->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Stage $stage)
    {
        return true;
    }
}
