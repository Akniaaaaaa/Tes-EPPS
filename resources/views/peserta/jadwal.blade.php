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
      <div class="card-header" style="color: rgb(0, 0, 0)"><h3 align="center" class="mt-3">Jadwal Ujian </div>
      <div class="card-body">
        {{-- <h5 class="card-title">Primary card title</h5> --}}
       <center>
        <div class="card" style="width: 25rem; box-shadow: 4px 3px 8px 1px #000000;" >
          <div class="card-body">
            <h5 class="card-title" style="color: black">
            {{-- <?php
            $tgl_tes = $jadwall->tanggal_tes;
              echo ($tgl_tes->format(('l, d F Y H')))?>--}}
              {{-- {{$jadwall->tanggal_tes}}</h5>  --}}
            <p class="card-text" align="left" style="color: black">Peserta Dapat Melakukan Ujian Pada:</p>
            <p class="card-text" align="left" style="color: black"><span class="badge bg-primary" style="width: 100%">Tanggal Tes </span></p><p class="card-text" align="right" style="color: black">{{$jadwall->tanggal_tes}}</p>
            <p class="card-text" align="left" style="color: black"><span class="badge bg-primary" style="width: 100%">Jam Tes </span></p><p class="card-text" align="right" style="color: black">{{$jadwall->jam_tes}}</p>
            <p class="card-text" align="left" style="color: black"><span class="badge bg-primary" style="width: 100%">Token </span></p><p class="card-text" align="right" style="color: black">{{$jadwall->token}}</p>

            <center>
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#konfirmasi">Mulai</button>
            </center>
          </div>
        </div>
      </center>
      @csrf
      {{-- <a href="{{route('soal',1)}}" 
          class="btn btn-sm btn-primary" style="color: white; cursor: pointer;border-radius: 50px;"
          data-toggle="modal" data-target="#tambah_soal"
          >MULAI</a>   
            --}}
          </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
  <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
    <div class="modal-content bg-gradient-primary">
      <div class="modal-header">
        <h5 class="modal-title" style="color: white" id="staticBackdropLabel">Konfirmasi Token</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="get" action="{{ route('konfirmasi_token.peserta', Auth::guard('peserta')->id()) }}" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-md-10">
                   
                      <div class="form-group ml-2">
                          <label for="konfirmasi">Token</label>
                          <input type="text" class="form-control @error('konfirmasi') is-invalid 
                  @enderror" id="konfirmasi" placeholder="Masukkan Token Ujian" name="konfirmasi" value="{{  old('konfirmasi') }}">
                          @error('konfirmasi')
                          <div class="invalid-feedback">
                              {{$message}}</div>
                          @enderror
                      </div>

                      <div class="text-right mx-4 my-1 mb-4">
                          <button type="submit" class="btn btn-dark mt-4 mb-3">Konfirmasi</button>
                          <button type="reset" class="btn btn-danger mt-4 mb-3">Batal</button>
                      </div>
                  </div>
               </div>
           </form>
      </div>
  </div>

@endsection