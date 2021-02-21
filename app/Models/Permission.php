<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;
    // Allows Mass assignments.
    protected $guarded = [];

    public function roles(): BelongsToMany
    {
        // Creates a Many to Many relationship with Role <-> Permission
        return $this->belongsToMany(Role::class);
    }

    public function users(): BelongsToMany
    {
        // Creates a Many to Many relationship with Users <-> Permission
        return $this->belongsToMany(User::class);
    }
}
