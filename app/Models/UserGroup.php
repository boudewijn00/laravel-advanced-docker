<?php

declare(strict_types=1);

namespace App\Models;

class UserGroup extends \Illuminate\Database\Eloquent\Model
{
    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }
}
