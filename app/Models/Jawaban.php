<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $table = 'tb_jawaban';
    protected $fillable = ['id_peserta', 'id_soal', 'jawaban'];
    protected $primarykey = 'id_jawaban';
    public $timestamps = false;
    public function soal()
    {
        return $this->hasMany(Jawaban::class, 'nomor_soal', 'nomor_soal');
    }
}
