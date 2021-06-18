@extends('layout/admin')
@section('container')
<div class="container">
    <div class="card">
        <div class="card-header " style="color:blue">
            <center>
                <h3 class="m-0 font-weight-bold text-primary">JADWAL UJIAN </h3>
               </center>        
            </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="card-body">
                <div class="table-responsive">
                    
                <table id="example1" class="table table-bordered table-striped">
                    <div class="container-fluid">
                        <div class="row mt-5 mb-3"  align="right">
                            <div class="col-6 ">
                        {{-- <h2 class="text-center display-4">Search</h2> --}}
                        
                                <form action="/admin/cari_jadwal_ujian" method="GET">
                                    <div class="input-group">
                                        <input type="search" name="cari" value="{{ old('cari') }}" class="form-control form-control-lg" placeholder="Temukan jadwal">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-lg btn-default" value="cari" href="/admin/cari_soal">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 ">
                                <a href="/admin/tambah_jadwal" class="btn btn-primary mb-1">Tambah Jadwal</a>
                                  {{-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_peserta">Tambah peserta</button> --}}
                            </div>
                        </div>

            <!-- Button trigger modal -->
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Peserta</th>
                        <th scope="col">Tanggal Ujian</th>
                        <th scope="col">Jam Ujian</th>
                        <th scope="col">Token</th>
                        {{-- <th scope="col">Waktu</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($jadwal as $p) : ?>
                        <tr>
                            <td>{{$no++}} </td>
                            <td>{{$p->nama}} </td>
                            <td>{{$p->tanggal_tes }}</td>
                            <td>{{$p->jam_tes }}</td>
                            <td>{{$p->token}} </td>
                            {{-- <td>{{$p->waktu}} </td> --}}
                            <td><?php 
                            if($p->status_ujian==1){
                                echo ("Belum Mengikuti Ujian");
                            }else {
                                echo("Sudah Mengikuti Ujian");
                            }
                            ?> </td>
                            <td>
                                @csrf
                                <a href="{{ route('admin/ubah_jadwal',$p->id_jadwal) }}" 
                                    class="btn btn-sm btn-primary" style="color: white; cursor: pointer;"
                                    data-target="#edit_soal">
                                    <i class="fas fa-edit"></i></a>
                            
                                    <a href="/admin/hapus_jadwal_tes/{{$p->id_jadwal}}"
                                        class="btn btn-sm btn-primary" style="color: white; cursor: pointer;"
                                        onclick="return confirm('Apakah Ingin Menghapus Data  ini ?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    @method('delete')
                                    @csrf
                            </td> 
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            {{$jadwal->links("pagination::bootstrap-4")}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
</div>
<!-- /.container-fluid -->
</div>
  
@endsection