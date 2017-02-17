<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 'rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function profile()
    {
        return $this->hasOne('App\UserProfile');
    }

    public function setPasswordAttribute($value)
    {
        if (!empty($value)){
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function scopeName($query, $name)
    {
        if (trim($name) != "") {
            $query->where(\DB::raw("CONCAT(firstName,' ',lastName)"), "LIKE", "%$name%");
        }
    }

    public function scopeRol($query, $rol)
    {
        $roles = config('options.rol');
        if ($rol != '' && isset($roles[$rol])) {
            $query->where('rol', $rol);
        }
    }
}
