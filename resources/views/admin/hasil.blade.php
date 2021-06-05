@extends('layout/admin')
@section('container')
<div class="container">
    <div class="card">
        <div class="card-header " style="color:blue">
            <center>
                <h3 class="m-0 font-weight-bold text-primary">HASIL UJIAN </h3>
               </center>        
            </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="card-body">
                <div class="table-responsive">
                    
                <table id="example1" class="table table-bordered table-striped">
                    <div class="container-fluid">
                        {{-- <h2 class="text-center display-4">Search</h2> --}}
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="/admin/cari_jadwal_ujian" method="GET">
                                    <div class="input-group">
                                        <input type="search" name="cari" value="{{ old('cari') }}" class="form-control form-control-lg" placeholder="Temukan Peserta">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-lg btn-default" value="cari" href="/admin/cari_soal">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                        <th scope="col">Nama Peserta</th>
                        <th scope="col">Status HPP</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($hasil as $p) : ?>
                        <tr>
                            <td>{{$no++}} </td>
                            <td>{{$p->nama}} </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Primary link</a>
                                    <a href="#" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Link</a>
                                  </div>    
                            </td>

                            <td>
                                @csrf
                                <a href="{{ route('admin/info_peserta', $p->id_peserta) }}" 
                                    class="btn btn-sm btn-primary" style="color: white; cursor: pointer;"
                                    data-target="#edit_soal">
                                    <i class="fas fa-info"></i></a>
                            
                                @method('delete')
                                @csrf
                                <a href="/admin/jadwal_tes/{{$p->id_peserta}}"
                                    class="btn btn-sm btn-primary" style="color: white; cursor: pointer;"
                                    onclick="return confirm('Apakah Ingin Menghapus Data  ini ?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td> 
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            {{-- {{$hasil->links("pagination::bootstrap-4")}} --}}
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