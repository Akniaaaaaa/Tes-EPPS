<?php

namespace App\Http\Controllers;

// use App\Http\Middleware\Peserta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\SoalRequest;
use App\Http\Requests\JadwalRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Soal;
use App\Models\Jadwal;
use App\Models\Peserta;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pp = DB::table('tb_pesertas')->where(DB::raw(MONTH('created_at')), $month);
        $peserta = DB::table('tb_pesertas')
            ->select([
                DB::raw('count(id) as `count`'),
                DB::raw('MONTH(created_at) as month')
            ])
            ->groupBy('month')
            // ->where('created_at', '>=', Carbon::now()->month(1))
            ->get();
        // dd($peserta);
        $nb =  [
            '   ',
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ];
        $bulan = [];
        // data untuk chart
        $data = [];
        foreach ($peserta as $p) {
            $bulan[] =  $nb[$p->month];
            $data[] = $p->count;
        }
        // dd($peserta);

        return view('admin/dashboard', compact('bulan', 'data'));
    }
    public function soal()
    {
        $tb_soal = DB::table('tb_soal')->paginate(10);
        return view('admin/soal', compact('tb_soal'));
    }
    public function peserta()
    {
        $tb_peserta = DB::table('tb_pesertas')->paginate(5);
        return view('admin/peserta', compact('tb_peserta'));
    }
    public function info_peserta($peserta)
    {
        $peserta = DB::table('tb_pesertas')->where('id', $peserta)->first();
        return view('admin.info', compact('peserta'));
    }
    public function hapus_peserta($peserta)
    {
        $peserta = DB::table('tb_pesertas')->where('id', $peserta)->delete();
        return redirect('/admin/peserta')->with('status', 'Data Berhasil Dihapus');
    }
    public function tambah_pegawai()
    {
    }
    public function tambah_peserta(Request $request)
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

        return redirect('admin/peserta')->with('status', 'Data Berhasil Ditambahkan');
    }
    public function tambah_soal()
    {
        $tb_soal = DB::table('tb_soal')->get();
        return view('admin.tambah_soal', compact('tb_soal'));
    }
    public function jadwal_tes()
    {
        $tb_jadwal = DB::table('tb_jadwal')->paginate(5);
        return view('admin.jadwal_tes', compact('tb_jadwal'));
    }
    public function tambah_jadwal()
    {
        $tb_peserta = DB::table('users')->get();
        $tb_jadwal = DB::table('tb_jadwal')->get();
        return view('admin.tambah_jadwal', compact('tb_jadwal', 'tb_peserta'));
    }
    public function store_jadwal(JadwalRequest $request)
    {
        $data = $request->validated();
        Jadwal::create($data);
        return redirect('/admin/jadwal_tes')->with('status', 'Data Berhasil Ditambahkan');
    }
    public function store_ujian(JadwalRequest $request)
    {
        $data = $request->validated();
        Soal::create($data);
        return redirect('/admin/soal')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SoalRequest $request)
    {
        $data = $request->validated();
        Soal::create($data);
        return redirect('/admin/soal')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_soal($id)
    {
        $tb_soal = DB::table('tb_soal')->where('nomor_soal', $id);
        return view('admin/soal', compact('tb_soal'));
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
    public function hapus_soal($id)
    {
        DB::table('tb_soal')->where('nomor_soal', $id)->delete();
        return redirect('/admin/soal')->with('status', 'Data Berhasil Dihapus');
    }
    public function cari_soal(Request $request)
    {
        $cari = $request->cari;
        $tb_soal = DB::table('tb_soal')
            ->where('pilihan_a', 'like', "%" . $cari . "%")
            ->orwhere('pilihan_b', 'like', "%" . $cari . "%")
            ->orwhere('nomor_soal', 'like', "%" . $cari . "%")
            ->paginate();
        return view('admin.soal', compact('tb_soal'));
    }
}
