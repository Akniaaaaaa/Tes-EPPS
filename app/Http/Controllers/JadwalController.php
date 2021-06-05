<?php

namespace App\Http\Controllers;

// use App\Http\Middleware\Peserta;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Dirape\Token\Token;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Jadwal as ModelsJadwal;
use PHPUnit\Framework\Test;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = DB::table('tb_jadwal')
            ->join('tb_pesertas', 'tb_jadwal.id_peserta', '=', 'tb_pesertas.id')
            ->select(
                'tb_pesertas.nama as nama',
                'tb_jadwal.id_jadwal as id_jadwal',
                'tb_jadwal.tanggal_tes as tanggal_tes',
                'tb_jadwal.jam_tes as jam_tes',
                'tb_jadwal.token as token',
                'tb_jadwal.waktu as waktu',
                'tb_jadwal.status_ujian as status_ujian',
            )
            ->paginate(10);
        return view('admin.jadwal_tes', compact('jadwal'));
    }
    public function ubah_jadwal($id)
    {
        $tb_jadwal = DB::table('tb_jadwal')->where('id_jadwal', $id)->first();
        $tb_peserta = Peserta::get();
        // $daftar_jadwal = Jadwal::with('peserta')->where('id_jadwal', $id)->first();
        return view('admin.ubah_jadwal', compact('tb_jadwal', 'tb_peserta'))->with('status', 'Data Berhasil Diedit');
    }
    public function store_ubah_jadwal(Request $request)
    {
        foreach ($request->jadwal as $data) {
            $jadwal = new Jadwal;
            $jadwal->id_peserta = $data;
            $jadwal->tanggal_tes = $request->input('tanggal_tes');
            $jadwal->waktu = $request->input('waktu');
            $jadwal->jam_tes = $request->input('jam_tes');
            $jadwal->token = (new Token)->Unique('tb_jadwal', 'token', 5);
            $jadwal->status_ujian = '1';
            $jadwal->update();
        }
        return redirect('/admin/jadwal_tes')->with('status', 'Data Berhasil Ditambahkan');
    }
    public function hapus_jadwal_tes($id)
    {
        $tb_jadwal = DB::table('tb_jadwal')->where('id_jadwal', $id)->delete();
        return redirect('admin.jadwal_tes', compact('tb_jadwal'))->with('status', 'Data Berhasil dihapus');
    }
    public function jadwal_peserta()
    {
        $daftar_jadwal = DB::table('tb_jadwal')
            ->where('tb_jadwal.id_peserta', '=', auth()->user()->id)
            ->join('tb_pesertas', 'tb_jadwal.id_peserta', '=', 'tb_pesertas.id')
            ->select(
                'tb_pesertas.nama as nama',
                'tb_jadwal.tanggal_tes as tanggal_tes',
                'tb_jadwal.jam_tes as jam_tes',
                'tb_jadwal.token as token',
            )
            ->get();
        return view('peserta.jadwal', compact('daftar_jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tb_peserta = Peserta::get();
        $tb_jadwal = Jadwal::get();
        return view('admin.tambah_jadwal', compact('tb_jadwal', 'tb_peserta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->jadwal as $data) {
            $jadwal = new Jadwal;
            $jadwal->id_peserta = $data;
            $jadwal->tanggal_tes = $request->input('tanggal_tes');
            $jadwal->waktu = $request->input('waktu');
            $jadwal->jam_tes = $request->input('jam_tes');
            $jadwal->jam_selesai = $request->input('jam_selesai');
            $jadwal->token = (new Token)->Unique('tb_jadwal', 'token', 5);
            $jadwal->status_ujian = '1';
            $jadwal->save();
        }
        return redirect('/admin/jadwal_tes')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function token(Request $request)
    {
        $input = $request->inputan;
        $peserta = auth()->user()->id;
        $data_jadwal = Jadwal::with('peserta')->where('id_peserta', $peserta)->first();
        if ($data_jadwal->status_ujian == 1) {
            if ($input == $data_jadwal->token) {
                return redirect()->route('soal', $request->input('nomor_soal', 1));
            } else {
                return redirect()->route('jadwal.peserta', auth()->user()->id);
            }
        } elseif ($data_jadwal->status_ujian == 2) {
            echo "Anda Telah Mengikuti Tes";
        }
    }
    public function konfirmasi_token(Request $request, Peserta $peserta)
    {

        $peserta = auth()->user()->id;
        $jadwall = DB::table('tb_jadwal')
            ->leftJoin('tb_pesertas', 'tb_jadwal.id_peserta', 'tb_pesertas.id')
            ->where('tb_pesertas.id', $peserta)
            ->first();
        $daftar_jadwal = Jadwal::with('peserta')->where('id_peserta', $peserta)->first()->token;
        // $cek = Hash::check($daftar_jadwal);
        $token = $request->input('konfirmasi');
        // dd($token);
        if ($token == $daftar_jadwal) {
            return redirect()->route('soal', 1);
        } else {
            return view('peserta/jadwal', compact('jadwall'));
        }
    }
}
