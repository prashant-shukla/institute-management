<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\HasName;



class User extends Authenticatable implements HasName
{
    const ADMIN_ROLE = 'admin';
    const STUDENT_ROLE = 'student';
    use HasFactory, Notifiable;
    use HasRoles;
    protected $guard_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'firstname',
        'lastname',
        'role_id',
        'password',
        'status',
        'name',
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

    public function isSuperAdmin(): bool
    {
        return $this->hasRole(config('filament-shield.super_admin.name'));
    }


  public function getFilamentName(): string
    {
        // ✅ Return a string – do NOT return null
        $fullName = trim("{$this->firstname} {$this->lastname}");

        return $fullName !== '' ? $fullName : ($this->email ?? 'Guest');
    }

    public function getFullNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

public function canAccessPanel($panel): bool
{
    if ($panel->getId() === 'admin') {
        return $this->role_id == 20; // केवल super admin
    }

    if ($panel->getId() === 'student') {
        return $this->role_id == 22; // केवल students
    }

    return false;
}
  
  
}
