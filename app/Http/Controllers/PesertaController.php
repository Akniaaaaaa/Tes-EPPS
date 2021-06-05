<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use App\Http\Middleware\Peserta;
use App\Http\Requests\PesertaRequest;
use App\Models\Jadwal;
use App\Models\Soal;
use App\Models\Peserta;
use App\Models\Jawaban;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buat_akun()
    {
        return view('peserta/buat_akun');
    }
    public function profile(Peserta $peserta)
    {
        return view('peserta.profile', compact('peserta',));
    }
    public function jadwal_peserta(Peserta $peserta)
    {
        $peserta =  auth()->user()->id;
        $jadwall = DB::table('tb_jadwal')
            ->leftJoin('tb_pesertas', 'tb_jadwal.id_peserta', 'tb_pesertas.id')
            ->where('tb_pesertas.id', $peserta)
            ->first();
        // $jadwal = Jadwal::with('peserta')->where('id_peserta', $peserta)->get();
        return view('peserta.jadwal', compact('peserta', 'jadwall'));
    }
    public function store_akun(Request $request)
    {
        // $data = $request->validated();
        // $data['foto'] = $data['foto']->store('peserta');
        // Peserta::create($data);

        if ($request->file('foto') != null) {
            $file = $request->file('foto');
            $fileName = $request->nama . '.' . $file->extension();
            $file->storeAs('public/unggah/Profile/Peserta/', $fileName);

            Peserta::create([
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'tempat_lahir' => $request->tempat_lahir,
                'foto' => $fileName,
            ]);
        } else {
            Peserta::create([
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'tempat_lahir' => $request->tempat_lahir,
            ]);
        }

        return redirect('login');
    }
    public function ubah_akun(Peserta $peserta)
    {
        return view('peserta.ubah_akun', compact('peserta'));
    }
    public function simpan_perubahan(PesertaRequest $request, $id)
    {
        if ($request->file('foto') != null) {
            $file = $request->file('foto');
            $fileName = $request->nama . '.' . $file->extension();
            $file->storeAs('public/unggah/Profile/Peserta/', $fileName);
            $peserta = Peserta::where(['id' => Auth::guard('peserta')->id()])->first();
            DB::table('tb_pesertas')->where('id', $peserta->id)->update(['nama' => $request->input('nama')]);
            DB::table('tb_pesertas')->where('id', $peserta->id)->update(['email' => $request->input('email')]);
            DB::table('tb_pesertas')->where('id', $peserta->id)->update(['tempat_lahir' => $request->input('tempat_lahir')]);
            DB::table('tb_pesertas')->where('id', $peserta->id)->update(['tanggal_lahir' => $request->input('tanggal_lahir')]);
            DB::table('tb_pesertas')->where('id', $peserta->id)->update(['alamat' => $request->input('alamat')]);
            DB::table('tb_pesertas')->where('id', $peserta->id)->update(['no_hp' => $request->input('no_hp')]);
            DB::table('tb_pesertas')->where('id', $peserta->id)->update(['foto' =>  $fileName]);
            DB::table('tb_pesertas')->where('id', $peserta->id)->update(['password' => Hash::make($request->input('password'))]);
        }
        return redirect()->route('profile.peserta', Auth::guard('peserta')->id())->with('status', 'Data Berhasil Diubah');
    }
    public function lihat($nomor)
    {
        $soal = Soal::where('nomor_soal', $nomor)->first();
        $tb_soal = Soal::all();
        $id_peserta = auth()->user()->id;
        $tb_jawaban = DB::table('tb_jawaban')
            ->where('id_peserta', $id_peserta)

            ->get();

        dd($tb_jawaban);
        $jawaban = Jawaban::where('nomor_soal', $nomor)->first()->jawaban;
        return view('peserta/soal', compact('soal', 'tb_soal', 'tb_jawaban', 'jawaban'))->with('soal_nomor', $nomor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function jawaban(JawabanRequest $request)
    public function jawaban(Request $request)
    {

        $jawaban = Jawaban::where(['id_peserta' => auth()->user()->id, 'nomor_soal' => $request->input('nomor_soal')])->first();
        $nomor_soal = Soal::where('nomor_soal', 226);
        if (!empty($jawaban)) {
            DB::table('tb_jawaban')->where('id_jawaban', $jawaban->id_jawaban)->update(['id_peserta' => Auth::user()->id]);
            DB::table('tb_jawaban')->where('id_jawaban', $jawaban->id_jawaban)->update(['nomor_soal' => $request->input('nomor_soal')]);
            DB::table('tb_jawaban')->where('id_jawaban', $jawaban->id_jawaban)->update(['jawaban' => $request->input('pilihan')]);
            if ($nomor_soal) {
                return redirect()->route('hpp.peserta', Auth::guard('peserta')->id())->with('status', 'Jawaban Berhasil diupdate');
            } else {
                return redirect()->route('soal', $request->input('nomor_soal') + 1)->with('status', 'Jawaban Berhasil diupdate');
            }
        } else {
            $jawab = new Jawaban;
            $jawab->id_peserta = Auth::user()->id;
            $jawab->nomor_soal = $request->input('nomor_soal');
            $jawab->jawaban = $request->input('pilihan');
            $jawab->save();
            return redirect()->route('soal', $request->input('nomor_soal') + 1)->with('status', 'Jawaban Berhasil disimpan');
        }
    }
    public function cetak_hpp($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('peserta/hpp', compact('user'));
    }
    public function petunjuk()
    {

        return view('peserta/petunjuk');
    }
}
