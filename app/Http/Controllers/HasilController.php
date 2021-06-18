<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use App\Models\Kategori;
use App\Models\Hasil;
use App\Models\Pesentil;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function getHasil()
    // {
    // $jenis_kelamin = auth()->user()->jenis_kelamin;
    // $peserta_id = auth()->user()->id;
    // $id_persentil = DB::table('tb_hasil')
    //     ->leftJoin('tb_pesertas', 'tb_hasil.id_peserta', 'tb_pesertas.id')
    //     ->where('tb_pesertas.id', $peserta_id)
    //     ->get()
    //     ->first()
    //     ->sum;
    // $hasil = DB::table('tb_pesentil')
    //     ->where('id_persentil', $id_persentil)
    //     ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
    //     ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
    //     ->first()->pesentil;

    //     return $hasil;
    // }

    public function hasil(Request $request, Peserta $peserta)
    {
        //skoring kategori 1
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 1;

        $ck1 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->user()->id,
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [2, 3, 4, 5, 76, 77, 78, 79, 80, 151, 152, 153, 154, 155])
            ->count();
        $rk1 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [6, 11, 16, 21, 26, 31, 36, 41, 46, 51, 56, 61, 66, 71])
            ->count();
        $cc = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 1
        ])->first('jawaban');
        $cc1 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 151
        ])->first('jawaban');
        $sk1 = $ck1 + $rk1;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk1)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;

        $k1 = new Hasil;
        $k1->id_peserta = Auth::guard('peserta')->id();
        $k1->id_kategori = $kategori;
        $k1->id_pesentil = $hasil;
        $k1->col = $ck1;
        $k1->row = $rk1;
        $k1->sum = $sk1;
        if ($cc == $cc1) {
            $k1->cons = 1;
        } else {
            $k1->cons = 0;
        }

        $k1->save();

        //skoring kategori 2
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 2;
        $ck2 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [6, 8, 9, 10, 81, 82, 83, 84, 85, 156, 157, 158, 159, 160])
            ->count();
        $rk2 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [2, 12, 17, 22, 27, 32, 37, 42, 47, 52, 57, 62, 67, 72])
            ->count();
        $jw1k2 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 7
        ])->first('jawaban');
        $jw2k2 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 157
        ])->first('jawaban');
        $sk2 = $ck2 + $rk2;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk2)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k2 = new Hasil;
        $k2->id_peserta = Auth::guard('peserta')->id();
        $k2->id_kategori = $kategori;
        $k2->id_pesentil = $hasil;
        $k2->col = $ck2;
        $k2->row = $rk2;
        $k2->sum = $sk2;
        if ($jw1k2 == $jw2k2) {
            $k2->cons = 1;
        } else {
            $k2->cons = 0;
        }
        $k2->save();

        //skoring kategori 3
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 3;
        $ck3 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [11, 12, 14, 15, 86, 87, 88, 89, 90, 161, 162, 163, 164, 165])
            ->count();
        $rk3 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [3, 8, 18, 23, 28, 33, 38, 43, 48, 53, 58, 63, 68, 73])
            ->count();
        $jw1k3 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 13
        ])->first('jawaban');
        $jw2k3 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 163
        ])->first('jawaban');
        $sk3 = $ck3 + $rk3;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk3)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k3 = new Hasil;
        $k3->id_peserta = Auth::guard('peserta')->id();
        $k3->id_kategori = $kategori;
        $k3->id_pesentil = $hasil;
        $k3->col = $ck3;
        $k3->row = $rk3;
        $k3->sum = $sk3;
        if ($jw1k3 == $jw2k3) {
            $k3->cons = 1;
        } else {
            $k3->cons = 0;
        }
        $k3->save();

        //skoring kategori 4
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 4;
        $ck4 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [16, 17, 18, 20, 91, 92, 93, 94, 95, 166, 167, 168, 169, 170])
            ->count();
        $rk4 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [4, 9, 14, 24, 29, 34, 39, 44, 49, 54, 59, 64, 69, 74])
            ->count();
        $jw1k4 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 14
        ])->first('jawaban');
        $jw2k4 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 164
        ])->first('jawaban');
        $sk4 = $ck4 + $rk4;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk4)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k4 = new Hasil;
        $k4->id_peserta = Auth::guard('peserta')->id();
        $k4->id_kategori = $kategori;
        $k4->id_pesentil = $hasil;
        $k4->col = $ck4;
        $k4->row = $rk4;
        $k4->sum = $sk4;
        if ($jw1k4 == $jw2k4) {
            $k4->cons = 1;
        } else {
            $k4->cons = 0;
        }
        $k4->save();
        //skoring kategori 5
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 5;
        $ck5 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [21, 22, 23, 24, 96, 97, 98, 99, 90, 171, 172, 173, 174, 175])
            ->count();
        $rk5 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [5, 10, 15, 20, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75])
            ->count();
        $jw1k5 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 25
        ])->first('jawaban');
        $jw2k5 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 175
        ])->first('jawaban');
        $sk5 = $ck5 + $rk5;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk5)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k5 = new Hasil;
        $k5->id_peserta = Auth::guard('peserta')->id();
        $k5->id_kategori = $kategori;
        $k5->id_pesentil = $hasil;
        $k5->col = $ck5;
        $k5->row = $rk5;
        $k5->sum = $sk5;
        if ($jw1k5 == $jw2k5) {
            $k5->cons = 1;
        } else {
            $k5->cons = 0;
        }
        $k5->save();

        //skoring kategori 6 
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 6;
        $ck6 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [26, 27, 28, 29, 30, 102, 103, 104, 105, 176, 177, 178, 179, 180])
            ->count();
        $rk6 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [76, 81, 86, 91, 96, 106, 111, 116, 121, 126, 131, 136, 141, 146])
            ->count();
        $jw1k6 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 26
        ])->first('jawaban');
        $jw2k6 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 101
        ])->first('jawaban');
        $sk6 = $ck6 + $rk6;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk6)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k6 = new Hasil;
        $k6->id_peserta = Auth::guard('peserta')->id();
        $k6->id_kategori = $kategori;
        $k6->id_pesentil = $hasil;
        $k6->col = $ck6;
        $k6->row = $rk6;
        $k6->sum = $sk6;
        if ($jw1k6 == $jw2k6) {
            $k6->cons = 1;
        } else {
            $k6->cons = 0;
        }
        $k6->save();

        //skoring kategori 7
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 7;
        $ck7 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [31, 32, 33, 34, 35, 106, 108, 109, 110, 181, 182, 183, 184, 185])
            ->count();
        $rk7 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [77, 82, 87, 92, 97, 102, 112, 117, 122, 127, 132, 137, 142, 147])
            ->count();
        $jw1k7 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 32
        ])->first('jawaban');
        $jw2k7 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 107
        ])->first('jawaban');
        $sk7 = $ck7 + $rk7;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk7)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k7 = new Hasil;
        $k7->id_peserta = Auth::guard('peserta')->id();
        $k7->id_kategori = $kategori;
        $k7->id_pesentil = $hasil;
        $k7->col = $ck7;
        $k7->row = $rk7;
        $k7->sum = $sk7;
        if ($jw1k7 == $jw2k7) {
            $k7->cons = 1;
        } else {
            $k7->cons = 0;
        }
        $k7->save();

        //SKORING KATEGORI 8
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 8;
        $ck8 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [36, 37, 38, 39, 40, 111, 112, 114, 115, 186, 187, 188, 189, 190])
            ->count();
        $rk8 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [78, 83, 88, 93, 98, 103, 108, 118, 123, 128, 133, 138, 143, 148])
            ->count();
        $jw1k8 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 38
        ])->first('jawaban');
        $jw2k8 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 113
        ])->first('jawaban');
        $sk8 = $ck8 + $rk8;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk8)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k8 = new Hasil;
        $k8->id_peserta = Auth::guard('peserta')->id();
        $k8->id_kategori = $kategori;
        $k8->id_pesentil = $hasil;
        $k8->col = $ck8;
        $k8->row = $rk8;
        $k8->sum = $sk8;
        if ($jw1k8 == $jw2k8) {
            $k8->cons = 1;
        } else {
            $k8->cons = 0;
        }
        $k8->save();

        // skoring kategori 9
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 9;
        $ck9 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [41, 42, 43, 44, 45, 116, 117, 118, 120, 191, 192, 193, 194, 195])
            ->count();
        $rk9 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [79, 84, 89, 94, 99, 104, 109, 114, 124, 129, 134, 139, 144, 149])
            ->count();
        $jw1k9 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 44
        ])->first('jawaban');
        $jw2k9 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 119
        ])->first('jawaban');
        $sk9 = $ck9 + $rk9;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk9)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k9 = new Hasil;
        $k9->id_peserta = Auth::guard('peserta')->id();
        $k9->id_kategori = $kategori;
        $k9->id_pesentil = $hasil;
        $k9->col = $ck9;
        $k9->row = $rk9;
        $k9->sum = $sk9;
        if ($jw1k9 == $jw2k9) {
            $k9->cons = 1;
        } else {
            $k9->cons = 0;
        }
        $k9->save();

        //skoring kategori 10
        $ck10 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [46, 47, 48, 49, 50, 121, 122, 123, 124, 196, 197, 198, 199, 200])
            ->count();
        $rk10 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [80, 85, 90, 95, 100, 105, 110, 115, 120, 130, 135, 140, 145, 150])
            ->count();
        $jw1k10 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 50
        ])->first('jawaban');
        $jw2k10 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 125
        ])->first('jawaban');
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 10;
        $sk10 = $ck10 + $rk10;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk10)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k10 = new Hasil;
        $k10->id_peserta = Auth::guard('peserta')->id();
        $k10->id_kategori = $kategori;
        $k10->id_pesentil = $hasil;
        $k10->col = $ck10;
        $k10->row = $rk10;
        $k10->sum = $sk10;
        if ($jw1k10 == $jw2k10) {
            $k10->cons = 1;
        } else {
            $k10->cons = 0;
        }
        $k10->save();

        //skoring kategori 11
        $ck11 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [51, 52, 53, 54, 55, 126, 127, 128, 129, 130, 202, 203, 204, 205])
            ->count();
        $rk11 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [151, 156, 161, 166, 171, 176, 181, 186, 191, 196, 206, 211, 216, 221])
            ->count();
        $jw1k11 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 51
        ])->first('jawaban');
        $jw2k11 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 201
        ])->first('jawaban');
        $sk11 = $ck11 + $rk11;
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 11;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk11)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k11 = new Hasil;
        $k11->id_peserta = Auth::guard('peserta')->id();
        $k11->id_kategori = $kategori;
        $k11->id_pesentil = $hasil;
        $k11->col = $ck11;
        $k11->row = $rk11;
        $k11->sum = $sk11;
        if ($jw1k11 == $jw2k11) {
            $k11->cons = 1;
        } else {
            $k11->cons = 0;
        }
        $k11->save();
        //skoring kategori 12
        $ck12 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [56, 57, 58, 59, 60, 131, 132, 133, 134, 135, 206, 208, 209, 210])
            ->count();
        $rk12 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [152, 157, 162, 167, 172, 177, 182, 187, 192, 197, 202, 212, 217, 222])
            ->count();
        $jw1k12 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 57
        ])->first('jawaban');
        $jw2k12 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 207
        ])->first('jawaban');
        $sk12 = $ck12 + $rk12;
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 12;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk12)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k12 = new Hasil;
        $k12->id_peserta = Auth::guard('peserta')->id();
        $k12->id_kategori = $kategori;
        $k12->id_pesentil = $hasil;
        $k12->col = $ck12;
        $k12->row = $rk12;
        $k12->sum = $sk12;
        if ($jw1k12 == $jw2k12) {
            $k12->cons = 1;
        } else {
            $k12->cons = 0;
        }
        $k12->save();

        //skoring kategori 13
        $ck13 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [61, 62, 63, 64, 65, 136, 137, 138, 139, 140, 211, 212, 214, 215])
            ->count();
        $rk13 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [153, 158, 163, 168, 173, 178, 183, 188, 193, 198, 203, 208, 218, 223])
            ->count();
        $jw1k13 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 63
        ])->first('jawaban');
        $jw2k13 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 213
        ])->first('jawaban');
        $sk13 = $ck13 + $rk13;
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 13;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk13)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k13 = new Hasil;
        $k13->id_peserta = Auth::guard('peserta')->id();
        $k13->id_kategori = $kategori;
        $k13->id_pesentil = $hasil;
        $k13->col = $ck13;
        $k13->row = $rk13;
        $k13->sum = $sk13;
        if ($jw1k13 == $jw2k13) {
            $k13->cons = 1;
        } else {
            $k13->cons = 0;
        }
        $k13->save();

        //skoring kategori 14
        $hasil = $hasil;
        $ck14 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [66, 67, 68, 69, 70, 141, 142, 143, 144, 145, 216, 217, 218, 220])
            ->count();
        $rk14 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [154, 159, 164, 169, 174, 179, 184, 189, 194, 199, 204, 209, 214, 224])
            ->count();
        $jw1k14 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 69
        ])->first('jawaban');
        $jw2k14 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 219
        ])->first('jawaban');
        $sk14 = $ck14 + $rk14;
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 14;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk14)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k14 = new Hasil;
        $k14->id_peserta = Auth::guard('peserta')->id();
        $k14->id_kategori = $kategori;
        $k14->id_pesentil = $hasil;
        $k14->col = $ck14;
        $k14->row = $rk14;
        $k14->sum = $sk14;
        if ($jw1k14 == $jw2k14) {
            $k14->cons = 1;
        } else {
            $k14->cons = 0;
        }
        $k14->save();

        //skoring kategori 15


        $ck15 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'B',
        ])->whereIn('nomor_soal', [71, 72, 73, 74, 75, 146, 147, 148, 149, 150, 221, 222, 223, 224])
            ->count();
        $rk15 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'jawaban' => 'A',
        ])->whereIn('nomor_soal', [155, 160, 165, 170, 175, 180, 185, 190, 195, 200, 205, 210, 215, 220])
            ->count();
        $jw1k15 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 75
        ])->first('jawaban');
        $jw2k15 = Jawaban::where([
            'id_peserta' => Auth::guard('peserta')->id(),
            'nomor_soal' => 225
        ])->first('jawaban');
        $sk15 = $ck15 + $rk15;
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $peserta_id = auth()->user()->id;
        $kategori = 15;
        $hasil = DB::table('tb_pesentil')
            ->where('id_persentil', $sk15)
            ->where('tb_pesentil.jenis_kelamin', $jenis_kelamin)
            // ->leftJoin('tb_kategori', 'tb_pesentil.id_kategori', 'tb_kategori.id_kategori')
            ->where('id_kategori', $kategori)
            ->first()->pesentil;
        $k15 = new Hasil;
        $k15->id_peserta = Auth::guard('peserta')->id();
        $k15->id_kategori = $kategori;
        $k15->id_pesentil = $hasil;
        $k15->col = $ck15;
        $k15->row = $rk15;
        $k15->sum = $sk15;
        if ($jw1k15 == $jw2k15) {
            $k15->cons = 1;
        } else {
            $k15->cons = 0;
        }
        $k15->save();
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $id = auth()->user()->id;
        $nama_peserta = Peserta::where('id', $id)->first();
        $peserta_id = Peserta::where('id', $id)->first()->id;
        $hasil = DB::table('tb_hasil')
            ->where('id_peserta', $id)
            ->leftJoin('tb_kategori', 'tb_hasil.id_kategori', 'tb_kategori.id_kategori')
            ->select(
                'tb_kategori.id_kategori as id_kategori',
                'tb_kategori.nama_kategori as nama_kategori',
                'tb_kategori.keterangan_kategori as keterangan_kategori',
                'tb_hasil.id_pesentil as pesentil',
                'tb_hasil.analisis as analisis',
            )
            ->get();
        // return redirect('/peserta/hpp');
        return view('peserta/hasil', compact('nama_peserta', 'peserta_id', 'hasil'));

        // return redirect()->route('hpp.peserta', Auth::guard('peserta')->id());
    }
    public function hasil_peserta()
    {

        $hasil = DB::table('tb_hasil')
            ->leftJoin('tb_pesertas', 'tb_hasil.id_peserta', 'tb_pesertas.id')
            ->leftJoin('tb_pegawais', 'tb_hasil.psikolog', 'tb_pegawais.id')
            ->groupBy('tb_pesertas.nama')
            ->select(
                'tb_pesertas.nama as nama',
                'tb_hasil.id_hasil as id_hasil',
                'tb_hasil.id_peserta as id_peserta',
                'tb_hasil.psikolog as psikolog',
                'tb_pesertas.id as id',
                'tb_pegawais.id as id',
                'tb_pegawais.nama as nama_pegawai',
            )
            ->get();
        return view('admin/hasil', compact('hasil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak_hasil($id)
    {
        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $id = auth()->user()->id;
        $nama_peserta = Peserta::where('id', $id)->first();
        $peserta_id = Peserta::where('id', $id)->first()->id;
        $hasil = DB::table('tb_hasil')
            ->where('id_peserta', $id)
            ->leftJoin('tb_kategori', 'tb_hasil.id_kategori', 'tb_kategori.id_kategori')
            ->select(
                'tb_kategori.id_kategori as id_kategori',
                'tb_kategori.nama_kategori as nama_kategori',
                'tb_kategori.keterangan_kategori as keterangan_kategori',
                'tb_hasil.id_pesentil as pesentil',
                'tb_hasil.analisis as analisis',
                'tb_hasil.id_hasil as id_hasil',
            )
            ->get();
        $jadwal = DB::table('tb_jadwal')
            ->where('id_peserta', $id)
            ->first()->tanggal_tes;
        $hasil1 = Hasil::with(['kategori', 'peserta'])->where('id_peserta', $id)->get();
        $kategori = Kategori::all();
        return view('peserta/hasil_tes', compact('nama_peserta', 'hasil', 'hasil1', 'kategori', 'jadwal'));
    }
    public function info_peserta($id)
    {
        // dd($peserta);
        $nama_peserta = Peserta::where('id', $id)->first();
        $peserta_id = Peserta::where('id', $id)->first()->id;
        $jenis_kelamin = Peserta::where('id', $id)->first()->jenis_kelamin;
        $id_persentil = DB::table('tb_hasil')
            ->leftJoin('tb_pesertas', 'tb_hasil.id_peserta', 'tb_pesertas.id')
            ->where('tb_pesertas.id', $peserta_id)
            ->get()
            ->first()
            ->sum;

        $hasil = DB::table('tb_hasil')
            ->where('id_peserta', $id)
            ->leftJoin('tb_kategori', 'tb_hasil.id_kategori', 'tb_kategori.id_kategori')
            ->select(

                'tb_kategori.id_kategori as id_kategori',
                'tb_kategori.nama_kategori as nama_kategori',
                'tb_kategori.keterangan_kategori as keterangan_kategori',
                'tb_hasil.id_pesentil as pesentil',
                'tb_hasil.analisis as analisis',
            )
            ->get();

        $hasil1 = Hasil::with(['kategori', 'peserta'])->where('id_peserta', $id)
            ->get();
        $kategori = Kategori::all();
        $tinggi = $id_persentil >= 75;
        $cukup = $id_persentil <= 75 && $id_persentil >= 24;
        $rendah = $id_persentil <= 23;
        return view('admin/info_peserta', compact('nama_peserta', 'hasil', 'hasil1', 'kategori', 'tinggi', 'cukup', 'rendah', 'peserta_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function analisis(Request $request, $id)
    {
        foreach ($request->analisis as $key => $value) {
            // dd($request);
            $peserta_id = Peserta::where('id', $id)->first()->id;
            // $hasil = DB::table('tb_hasil')
            //     ->where('id_peserta', $peserta_id)
            //     ->where('tb_hasil.id_kategori', $key)
            //     ->first();
            DB::table('tb_hasil')->where('id_peserta', $peserta_id)
                ->where('id_kategori', $key)
                ->update([
                    'analisis' => $value,
                    'psikolog' => Auth::user()->id
                ]);

            // $hasil = new Hasil;
            // $hasil->analisis = $value;
            // $hasil->update();
            // dd($tes);
            // Hasil::where('id_peserta', $peserta_id)->update('analisis');
        }
        // return redirect('admin/hasil', compact('peserta_id'));
        return redirect()->route('hasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cetak($id)
    {

        $jenis_kelamin = auth()->user()->jenis_kelamin;
        $id = auth()->user()->id;
        $nama_peserta = Peserta::where('id', $id)->first();
        $peserta_id = Peserta::where('id', $id)->first()->id;
        $hasil = DB::table('tb_hasil')
            ->where('id_peserta', $id)
            ->leftJoin('tb_kategori', 'tb_hasil.id_kategori', 'tb_kategori.id_kategori')
            ->select(
                'tb_kategori.id_kategori as id_kategori',
                'tb_kategori.nama_kategori as nama_kategori',
                'tb_kategori.keterangan_kategori as keterangan_kategori',
                'tb_hasil.id_pesentil as pesentil',
                'tb_hasil.analisis as analisis',
            )
            ->get();
        $hasil1 = Hasil::with(['kategori', 'peserta'])->where('id_peserta', $id)->get();
        $kategori = Kategori::all();
        return view('peserta/cetak_hpp', compact('nama_peserta', 'hasil', 'hasil1', 'kategori', 'peserta_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
