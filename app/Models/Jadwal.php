<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'tb_jadwal';
    protected $fillable = ['tanggal_tes', 'jam_tes', 'id_peserta', 'status_ujian', 'token', 'jam_selesai'];
    protected $primarykey = 'id_jadwal';
    public $timestamps = false;
    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id', 'id');
    }
}
