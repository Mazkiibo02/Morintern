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

    // Actual table (migrations created/renamed to `peserta_calon`)
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

    // Scopes
    public function scopePendaftar($query)
    {
        return $query;
    }

    public function scopePeserta($query)
    {
        return $query->whereIn('status', ['accepted', 'diterima']);
    }

    public function scopeDitolak($query)
    {
        return $query->whereIn('status', ['rejected', 'ditolak']);
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

            if (in_array($status, ['accepted', 'diterima'])) {
                $promote = function (self $rc) {
                    $data = [
                        'nama_lengkap' => $rc->nama_lengkap,
                        'email' => $rc->email,
                        'password' => $rc->password ?: \Illuminate\Support\Str::random(16),
                        'google_id' => $rc->google_id,
                        'no_telp' => $rc->no_telp,
                        'ketua_id' => $rc->ketua_id,
                        'perusahaan_id' => $rc->perusahaan_id,
                        'kelompok_id' => $rc->kelompok_id,
                        'universitas' => (string) $rc->universitas_id,
                        'jurusan' => (string) $rc->jurusan_id,
                        'github' => $rc->github,
                        'linkedin' => $rc->linkedin,
                        'cv' => $rc->cv,
                        'surat' => $rc->surat,
                        'tanggal_daftar' => now(),
                    ];
                    $existing = Peserta::where('email', $rc->email)->first();
                    $existing ? $existing->update($data) : Peserta::create($data);
                    $rc->delete();
                };

                $promote($calon);

                if ($calon->kelompok_id && ($calon->id === $calon->kelompok_id)) {
                    $members = self::where('kelompok_id', $calon->kelompok_id)
                        ->where('id', '!=', $calon->id)
                        ->get();
                    foreach ($members as $member) {
                        $promote($member);
                    }
                }
                return;
            }

            if (in_array($status, ['rejected', 'ditolak'])) {
                if ($calon->kelompok_id && ($calon->id === $calon->kelompok_id)) {
                    \Illuminate\Database\Eloquent\Model::withoutEvents(function () use ($calon) {
                        self::where('kelompok_id', $calon->kelompok_id)->update(['status' => 'ditolak']);
                    });
                }
                return;
            }
        });
    }
}