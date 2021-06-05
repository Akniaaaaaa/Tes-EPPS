@extends('layout/pesertaa')
@section('container')
<div class="row ml-2 mr-2">
<div class="col-3 mb-5 mt-5">
  <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
    <div class="list-group" style="box-shadow: 4px 3px 8px 1px #4286ad;">
      
      <a href="{{ url('/peserta/petunjuk') }}" class="list-group-item list-group-item-action"><i class="fas fa-compass"></i>  Petunjuk</a>
      <a href="{{ route('jadwal.peserta', Auth::guard('peserta')->id()) }}" class="list-group-item list-group-item-action"><i class="fas fa-calendar-alt"></i>  Jadwal</a>
      <a href="{{ route('hpp.peserta', Auth::guard('peserta')->id()) }}"class="list-group-item list-group-item-action"><i class="fas fa-poll"></i>  Hasil</a>
      
    </div>
  </div>
</div>
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