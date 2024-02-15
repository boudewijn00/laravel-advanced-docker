<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Auth\Access\Response;

class GroupPolicy
{
    public function isInUserGroup(User $user, UserGroup $userGroup): bool
    {
        return $userGroup->users->contains($user->id) && $userGroup->name === 'admin';
    }
}
