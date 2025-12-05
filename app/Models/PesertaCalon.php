<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Peserta;

class PesertaCalon extends Model implements AuthenticatableContract
{
    use Authenticatable,  HasFactory, Notifiable;  // Tambah Notifiable untuk email notif

    protected $table = 'peserta_calon';

    protected $fillable = [
        'nama_lengkap', 'email', 'password', 'no_telp', 'universitas_id', 'jurusan_id',
        'spesialisasi_id', 'kelompok_id', 'ketua_id', 'tanggal_mulai', 'tanggal_selesai',
        'cv', 'surat', 'status', 'google_id', 'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    // Method wajib dari Authenticatable contract
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    // Relasi
    public function spesialisasi()
    {
        return $this->belongsTo(Spesialisasi::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'ketua_id');
    }

    public function kelompok()
    {
        return $this->belongsTo(self::class, 'kelompok_id');
    }

    protected static function booted()
    {
        static::saved(function (self $calon) {
            if (! $calon->wasChanged('status')) {
                return;
            }
            $status = strtolower((string) $calon->status);
            if (! in_array($status, ['accepted', 'diterima'])) {
                return;
            }

            $data = [
                'nama_lengkap' => $calon->nama_lengkap,
                'email' => $calon->email,
                'password' => $calon->password ?: \Illuminate\Support\Str::random(16),
                'google_id' => $calon->google_id,
                'no_telp' => $calon->no_telp,
                'ketua_id' => $calon->ketua_id,
                'perusahaan_id' => $calon->perusahaan_id,
                'kelompok_id' => $calon->kelompok_id,
                'universitas' => (string) $calon->universitas_id,
                'jurusan' => (string) $calon->jurusan_id,
                'github' => $calon->github,
                'linkedin' => $calon->linkedin,
                'cv' => $calon->cv,
                'surat' => $calon->surat,
                'tanggal_daftar' => now(),
            ];

            $existing = Peserta::where('email', $calon->email)->first();
            if ($existing) {
                $existing->update($data);
            } else {
                Peserta::create($data);
            }

            $calon->delete();
        });
    }
}
