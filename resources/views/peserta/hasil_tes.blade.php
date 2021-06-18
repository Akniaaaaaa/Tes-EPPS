@extends('layout/pesertaa')
@section('container')

<div class="col-9 mb-5 mt-5">
  <div id=halaman>
    <div class="row ml-2 mr-2">
      <div class="col-2 mb-2 mt-2">
    </div>
    {{-- <div class="col-9 mb-5 mt-5">
        <font face="Times New Roman" color="BLACK" size=4>
            <p align="center"><b> People Psychology Consulting</b></p>
        </font>
        <font face="Times New Roman" color="BLACK" size=3>
          <p align="center"> SAHABAT PSIKOLOGI</p>
        </font>
        {{-- <font face="Arial" color="green"> <p align="center"> PERMATA RENTAL </p></font> --}}
        {{-- <font face="Times New Roman" color="black" size="2">
            <p align="center"> <i>Alamat. Jl. Hibrida raya ujung rt.08./02 no.07 kel. Pagar dewa Kec. Selebar kota bengkulu </i></p>
        </font>
        <font face="Times New Roman" color="black" size="1">
            <p align="center"> <i>0823-8000-8887</i></p>
        </font>
    </div>
    <hr>  --}}
    <div class="container">
        <img src="{{ asset('appwebsite/gambar/kop surat ppc.png')}}" style="width: 100%; height: 8%;"/>
        
        <font face="Arial" color="BLACK" size="4">
            <p align="center"> <u> <b> HASIL PEMERIKSAAN PSIKOLOGI </b></u>
            </font><br>
          {{-- <font face="Arial" color="red" size="4"> Nomer: 8021/SMKN1/2015 </p></font> --}}
          <font face="Arial" color="BLACK" size="4">
            <p align="center">
              <span class="mr-2 d-none d-lg-inline text-white-600 small" style="color: black; text-transform: uppercase;" >
                <b>{{$nama_peserta->nama}}</b></span>
            </p>
            </font>
            <p align="center">
                <center><table class="table mt-5" style="background-color: cornflowerblue; width: 80%; font-color: white">
                    <tr>
                  <td style="width: 30%; color:white">TEMPAT/ TANGGAL LAHIR</td>
                  <td style="width: 5%; color:white">:</td>
                  <td style="width: 30%; color:white">{{$nama_peserta->tempat_lahir}}/ {{$nama_peserta->tanggal_lahir}}</td>
                </tr>
                <tr>
                  <td style="width: 30%; color:white" vertical-align: top;">JENIS KELAMIN</td>
                  <td style="width: 5%; color:white" vertical-align: top;">:</td>
                  <td style="width: 30%; color:white">{{$nama_peserta->jenis_kelamin}}</td>
                </tr>
                <tr>
                  <td style="width: 30%;color:white">TANGGAL PEMERIKSAAAN</td>
                  <td style="width: 5%;color:white">:</td>
                  <td style="width: 30%;color:white">{{Carbon\Carbon::now()->isoFormat('dddd, D MMM Y')}}</td>
                </tr>
              </table></center>
            </p>
            <font face="Arial" color="BLACK" size="4">
              <p align="left"> <u> <b> I. DESKRIPSI DATA </b></u><br>
                Berdasarkan kategori persentil:<br>
                > 75		:	tinggi<br>
                25 - 74	:	sedang<br>
                24 <	:	rendah	<br>
                diperoleh diskripsi data, sebagai berikut:
              </font><br>
              {{-- tabel hasil -peserta --}}
              <div class="table-responsive mt-5">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <!-- Button trigger modal -->
                  {{-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_soal">Tambah Soal</button> --}}
                  @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                  @endif
                  <thead>
                    <tr>
                      <th style="width: 5%; " scope="col" align="center">No</th>
                      <th style="width: 10%; " scope="col">Kategori</th>
                      <th style="width: 1%; " scope="col">Persentil</th>
                      <th style="width: 1%; " scope="col">Kategori</th>
                      <th style="width: 50%; " scope="col">Keterangan</th>
                      {{-- <th style="width: 50%; " scope="col">Dinamika Psikologis</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($hasil as $item_hasil) : ?>
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$item_hasil->nama_kategori}}</td>
                      <td>{{$item_hasil->pesentil}} %</td>
                      <td>
                        <?php
                        
                        if($item_hasil->pesentil >= 75 ){
                            echo('Tinggi');
                        }elseif ($item_hasil->pesentil >= 24 && $item_hasil->pesentil <= 74) {
                            echo('Cukup');
                        }elseif ($item_hasil->pesentil <= 23){
                            echo('Rendah');
                        }else{
                            echo ('Tidak Ketahui');
                        }
                        ?>
                      </td>
                      <td>
                          <?php
                        
                        if($item_hasil->pesentil >= 75 ){
                            echo('Subjek kuat ');
                            echo ($item_hasil->keterangan_kategori);
                        }elseif ($item_hasil->pesentil >= 24 && $item_hasil->pesentil <= 74) {
                            echo('Subjek cukup ');
                            echo ($item_hasil->keterangan_kategori);
                        }elseif ($item_hasil->pesentil <= 23){
                            echo('Subjek lemah ');
                            echo ($item_hasil->keterangan_kategori);
                        }else{
                            echo ('Tidak Ketahui');
                        }
                        ?>
                      </td>
                      
                    </tr>
                    <?php endforeach; ?>
                    
                    </tbody>
                </table>
                
                <font face="Arial" color="BLACK" size="4">
                    <u> <b> II. DINAMIKA PSIKOLOGIS </b></u><br>
                    <p align="left"  style="text-align: justify; text-indent: 50px">
                        
                        @foreach ($hasil as $hs)
                        <?php
                    echo ('Subjek');
                    if($hs->pesentil >= 75 ){
                        echo(' Subjek kuat ');
                        echo ($hs->keterangan_kategori);
                        echo('  Namun,  ');
                    }elseif ($hs->pesentil >= 24 && $hs->pesentil <= 74) {
                        echo(' cukup ');
                        echo ($hs->keterangan_kategori);
                        echo(' Tapi ');
                    }elseif ($hs->pesentil <= 23){
                        echo(' lemah ');
                        echo ($hs->keterangan_kategori);
                    }else{
                      echo ('Tidak Ketahui');
                    }
                    ?>
                    
                    @endforeach
                    
                    <br>
                    
                </font><br>
                {{-- <div class="form-group">
                    <label style="color: black">Deskripsi HPP</label>
                    <input type="textarea" name="deskripsihpp" class="form-control" value="{{$hasil->peserta->deskripsihpp}}" style="width:300px">
                    <input type="hidden" name="id_psikolog" class="form-control" value="{{1}}" style="width:300px">
                </div>   --}}
                <div class="row">
                    <div class="col 3">
                        <p align="left">
                            <br>
                            Direktur Utama<br>
                            <img src="{{ asset('appwebsite/gambar/ttddirektur.png')}}" style="width: 30%; height: 8%;"/>
                            <br>
                            
                            <h5>Indah Syoraya, S.Psi., M.A</h5>
                        </p>
                    </div>
                    
                    <div class="col 4">
                        <p align="right">
                            <br>
                            {{-- Bengkulu, {{Carbon\Carbon::now()->isoFormat(' D MMM Y')}} --}}
                            Bengkulu, {{Carbon\Carbon::now()->isoFormat(' D MMM Y')}}<br>
                            Psikolog Utama<br>
                            <img src="{{ asset('appwebsite/gambar/ttdpsikolog.png')}}" style="width: 30%; height: 8%;"/>
                    <br>
                    <br>
                    <h5 align="right">Yocie, S.Psi., M.Psi</h5>
                    
                </p>
                    </div>
                </div>
                @csrf
                <a href="{{route('cetak_hpp.peserta', Auth::guard('peserta')->id())}}" 
                    class="btn btn-sm btn-primary" style="color: white; cursor: pointer;"
                    data-target="#edit_soal">
                    <i class="fas fa-edit"></i>Cetak</a>
              </div>
      </div>
@endsection

