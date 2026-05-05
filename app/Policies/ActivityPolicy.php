<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ActivityPolicy
{
    public function view(User $user, Activity $activity)
    {
        return $user->id === $activity->user_id;
    }
}
