<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Peserta extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'tb_pesertas';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'password',
        'foto',
        'nama_pengguna',
        'foto_pembayaran',

    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }
    public function hasil()
    {
        return $this->hasMany(Hasil::class, 'id_hasil', 'id_hasil');
    }
}
