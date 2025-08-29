<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
// use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'designation',
        'password',
        'phone',
        'user_type',
        'avatar',
        'status',
        'working_hour',
        'call_in_better',
        'call_in_better_time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

     /**
     * Relationship: Leaves applied by this user.
     */

     public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    
    public function leavesApplied()
    {
        return $this->hasMany(Leave::class, 'applied_by');
    }
    
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Relationship: Leaves approved by this user.
     */
    public function leavesApproved()
    {
        return $this->hasMany(Leave::class, 'approved_by');
    }

    public function workingHours()
    {
        return $this->hasMany(WorkingHour::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function sickLeaves()
    {
        return $this->hasMany(SickReport::class, 'applied_by');
    }
}
