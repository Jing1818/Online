<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Combination;

class CombinationPolicy extends Policy
{
    public function update(User $user, Combination $combination)
    {
        // return $combination->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Combination $combination)
    {
        return true;
    }
}
