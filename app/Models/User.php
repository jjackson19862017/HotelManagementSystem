<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use Notifiable;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'avatar',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password){
        if ( $password !== null & $password !== "" )
        {
            //dd("Hey");
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function getDeletedByAttribute($id)
    {
        // Grabs the name of the User who deleted the User.
        return User::withTrashed()->whereId($id)->value('name');
    }

    public function getCreatedByAttribute($id)
    {
        // Grabs the name of the User who deleted the User.
        return User::withTrashed()->whereId($id)->value('name');
    }


    public function getLastLoginAtAttribute($date)
    {
        // Changes the Date from the Database (String) to a Carbon Date
        if($date == Null){
            return "Never Logged in";
        }
        return Carbon::parse($date)->diffForHumans();
    }

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        // Creates a Many to Many relationship with User <-> Permission
        return $this->belongsToMany(Permission::class);
    }

    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        // Creates a Many to Many relationship with Role <-> User
        return $this->belongsToMany(Role::class);
    }
}
