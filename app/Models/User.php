<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;        
use Filament\Panel;                               
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'role_id',
        'requested_role_id',
        'perusahaan_id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'google_id',
        'foto',
        'jabatan',
        'no_telp',
        'perusahaan',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // RELASI
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function requestedRole()
    {
        return $this->belongsTo(Role::class, 'requested_role_id');
    }

    // ROLE & PERMISSION
    public function isSuperAdmin(): bool
    {
        return $this->role_id === 1;
    }

    public function isAdminPanelAllowed(): bool
    {
        return in_array($this->role_id, [1, 2]);
    }

    // FILAMENT v4 CONTRACT — INI YANG BIKIN BISA LOGIN KE /admin
    public function canAccessPanel(Panel $panel): bool
    {
        // Kalau panelnya "admin", cek role_id 1 atau 2
        return $panel->getId() === 'admin' && $this->isAdminPanelAllowed();
    }
}