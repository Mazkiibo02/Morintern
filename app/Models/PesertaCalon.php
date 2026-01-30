<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PesertaCalon extends Model implements AuthenticatableContract
{
    use Authenticatable,  HasFactory, Notifiable;  // Tambah Notifiable untuk email notif

    // Actual table (migrations created/renamed to `peserta_calon`)
    protected $table = 'peserta_calon';

    // Status constants
    public const STATUS_PENDAFTAR = 'pendaftar';
    public const STATUS_PESERTA = 'peserta';
    public const STATUS_DITOLAK = 'ditolak';

    // Penilaian status constants
    public const PENILAIAN_PENDING = 'pending';
    public const PENILAIAN_LULUS = 'lulus';
    public const PENILAIAN_TIDAK_LULUS = 'tidak_lulus';

    // Get label for penilaian status
    public static function getPenilaianStatusLabelFor($status)
    {
        return match($status) {
            self::PENILAIAN_PENDING => 'Dalam Evaluasi',
            self::PENILAIAN_LULUS => 'Lulus',
            self::PENILAIAN_TIDAK_LULUS => 'Tidak Lulus',
            default => null,
        };
    }

    protected $fillable = [
        'nama_lengkap', 'email', 'password', 'no_telp', 'universitas', 'jurusan',
        'spesialisasi_id', 'kelompok_id', 'ketua_id', 'tanggal_mulai', 'tanggal_selesai',
        'cv', 'surat', 'status', 'google_id', 'remember_token', 'github', 'linkedin',
        'penilaian_status', 'kritik_saran', 'file_penilaian', 'dinilai_oleh', 'dinilai_pada'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'dinilai_pada' => 'datetime',
    ];

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

    // Scopes - filter by status column
    public function scopePendaftar($query)
    {
        return $query->where('status', self::STATUS_PENDAFTAR);
    }

    public function scopePeserta($query)
    {
        return $query->where('status', self::STATUS_PESERTA);
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', self::STATUS_DITOLAK);
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

    public function penilaian()
    {
        return $this->hasOne(Penilaian::class, 'peserta_calon_id');
    }

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'peserta_calon_id');
    }

    public function dinilaiOleh()
    {
        return $this->belongsTo(\App\Models\User::class, 'dinilai_oleh');
    }

    protected static function booted()
    {
        static::saved(function (self $calon) {
            if (! $calon->wasChanged('status')) {
                return;
            }
            $status = strtolower((string) $calon->status);

            // Handle rejection - update group members status
            if ($status === 'ditolak') {
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