<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        '_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }

    /*
    Check if user has a role
    */
    public function hasAnyRole(string $role){
        return null !== $this->roles()->where('name', $role)->first();
    }

    /*
    Check the user has any given role
    */
    public function hasAnyRoles(array $role){
        return null !== $this->roles()->whereIn('name', $role)->first();
    }

    // public function setPasswordAttribute($password){
    //     $this->attributes['password'] = Hash::make($password);    
    // }
}
