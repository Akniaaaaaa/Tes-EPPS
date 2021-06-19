<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'tb_soal';
    protected $fillable = ['nomor_soal', 'pilihan_a', 'pilihan_b'];
    protected $primarykey = 'nomor_soal';
    public $timestamps = false;
    // public function jawaban()
    // {
    //     return $this->belongsTo(Jawaban::class, 'id_jawaban');
    // }
    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class, 'nomor_soal', 'nomor_soal');
    }

    public function jawabanDiisi($nomor_soal)
    {
        $jawaban  = $this->jawaban;

        return $jawaban
            ? $jawaban->where(['nomor_soal' => $nomor_soal, 'id_peserta' => auth()->user()->id])->first()
            : false;
        // if ($jawaban) {
        //     $cekJawaban = $jawaban->where(['nomor_soal' => $nomor_soal, 'id_peserta' => auth()->user()->id])->first();
        //     if ($cekJawaban) {
        //         return true;
        //     }
        //     return false;
        // } else {
        //     return false;
        // }
    }
}
