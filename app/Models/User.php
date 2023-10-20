<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\CheckRolesPermission;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CheckRolesPermission;

    const EMPLOYEE = 'employee';
    const ADMIN = 'admin';

    const TYPES = [
        'admin' => 'Admin',
        'employee' => 'Employee'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
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

    public function tasks()
    {
        return $this->hasMany(Task::class, 'assign_to', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id')->whereNull('read_at');
    }

    public function isAdmin()
    {
        return $this->type == self::ADMIN;
    }

    public function isEmployee()
    {
        return $this->type == self::EMPLOYEE;
    }
}
