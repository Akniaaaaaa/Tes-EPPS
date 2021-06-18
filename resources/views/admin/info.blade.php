@extends('layout/admin')
@section('container')
<div class="container">
  <div class="row">
    <div class="col-5">

   
      <div class="card mb-5" style="width: 25rem; box-shadow: 4px 3px 8px 1px #4286ad;">
          <center><img src="{{ asset('storage/unggah/Profile/Peserta/' . $peserta->foto) }}" align ="center" style="width: 300px; height: 300px;" class="card-img-top mt-5" alt="...">
          {{-- <center><img src="{{ asset('storage/unggah/Profile/Peserta/' . $peserta->foto_pembayaran) }}" align ="center" style="width: 300px; height: 300px;" class="card-img-top mt-5" alt="..."> --}}
          </center>
          <left>
              <div class="card-body">
            <h5 class="card-title" align="center"  style="color: black; text-transform: uppercase;">{{ $peserta->nama}}</h5>
            <br>{{$peserta->nama_pengguna}}
            <p class="card-text" align="left" style="color: black; text-transform: uppercase;">{{ $peserta->tempat_lahir}}/{{$peserta->tanggal_lahir}}
          <br>{{$peserta->jenis_kelamin}}
          <br>0{{$peserta->no_hp}}
          <br>{{$peserta->alamat}}
            </left>
          </p>
          </div>
        </div>
      
      </div>
    </div>
</div>
  @endsection