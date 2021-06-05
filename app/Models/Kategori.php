<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'tb_kategori';
    protected $fillable = ['nama_kategori', 'keterangan_kategori'];
    protected $primarykey = 'id_kategori';
    public $timestamps = false;
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
