@extends('layout/pesertaa')
@section('container')

<div class="col-9 mb-5 mt-5">
    <div class="card text-white bg-gradient-primary" style="box-shadow: 4px 3px 8px 1px #4286ad;" >
      <div class="card-header" style="color: rgb(0, 0, 0)"><h3 align="center" class="mt-3">Petunjuk Pengerjaan </div>
      <div class="card-body">
        {{-- <h5 class="card-title">Primary card title</h5> --}}
        <p class="card-text mt-4">
          1. Ujian akan dilaksanakan selama 60 menit<br>
          2. Soal ujian terdiri dari 2 pernyataan<br>
          3. Pilihlah salah satu pernyataan yang paling mendiskripsikan diri anda atau yang tidak paling mendiskripsikan diri anda <br>
          4. Setelah memilih simpan jawaban dengan mengklik tombol simpan dan lanjutkan<br>
        </p>
        <center>
          @csrf
                                {{-- <a href="{{route('soal',1)}}"  --}}
                                <a href="{{ route('jadwal.peserta', Auth::guard('peserta')->id()) }}" 
                                    class="btn btn-sm btn-primary" style="color: white; cursor: pointer;border-radius: 50px;"
                                    >MULAI</a>
          </center>
      </div>
    </div>
  </div>
</div>

@endsection