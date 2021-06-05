<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'tb_hasil';
    protected $fillable = ['id_peserta', 'id_kategori', 'jawaban', 'row', 'col', 'sum', 'cons', 'analisis'];
    protected $primarykey = 'id_hasil';
    public $timestamps = false;
    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'nomor_soal', 'nomor_soal');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_peserta');
    }
    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id', 'id');
    }
    public function kategori()
    {
        return $this->hasMany(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function hasOneKategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
