<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    // Allows Mass assignments.
    protected $guarded = [];

    public function permissions(): BelongsToMany
    {
        // Creates a Many to Many relationship with Role <-> Permission
        return $this->belongsToMany(Permission::class);
    }
    public function users(): BelongsToMany
    {
        // Creates a Many to Many relationship with Role <-> Users
        return $this->belongsToMany(User::class);
    }

}
