<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Internship;

class InternshipPolicy extends Policy
{
    public function update(User $user, Internship $internship)
    {
        // return $internship->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Internship $internship)
    {
        return true;
    }
}
