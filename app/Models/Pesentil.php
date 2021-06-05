<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesentil extends Model
{
    use HasFactory;
    protected $table = 'tb_pesentil';
    protected $fillable = ['id_pesentil', 'id_kategori', 'jenis_kelamin', 'pesentil'];
    protected $primarykey = 'id';
    public $timestamps = false;
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
