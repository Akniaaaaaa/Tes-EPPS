@extends('layout/admin')
@section('container')
<div class="container">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <center>
                    <h3 class="m-0 font-weight-bold text-primary">Data Pegawai Sahabat Psikologi</h3>
                   </center>        
                </div>
            <!-- /.card-header -->
            <div class="card-body">
               
                    <div class="table-responsive">
                        
                        <table id="example1" class="table table-bordered table-striped">
                            <div class="container-fluid">
                                {{-- <h2 class="text-center display-4">Search</h2> --}}
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <form action="/transaksi/cari" method="GET">
                                            <div class="input-group">
                                                <input type="search" name="cari" value="{{ old('cari') }}" class="form-control form-control-lg" placeholder="Temukan Peserta">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-lg btn-default" value="cari" href="/transaksi/cari">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_pegawai">Tambah pegawai</button>
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif

                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                foreach ($tb_peserta as $p) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $p->email ?></td>
                                        <td><?php echo $p->nama ?></td>
                                        <td><a href="/admin/info/{{$p->id}}" 
                                            class="btn btn-sm btn-primary" style="color: white; cursor: pointer;">
                                            <i class="fas fa-info"></i></a>
                                        
                                            @method('delete')
                                            @csrf
                                            <a href="/admin/hapus/{{$p->id}}"
                                                class="btn btn-sm btn-primary" style="color: white; cursor: pointer;"
                                                onclick="return confirm('Apakah Ingin Menghapus Data Peserta ini ?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td> 
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        {{$tb_peserta->links("pagination::bootstrap-4")}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    
    <!-- /.content -->
</div>



  
  <!-- Modal -->
  <div class="modal fade" id="tambah_pegawai" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Peserta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
            <form method="post" action="/admin/tambah_peserta" enctype="multipart/form-data">
                @csrf
                <div class="form-group row ml-5">
                    <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('E-Mail ') }}</label>
                    <div class="col-md-10">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row ml-5">
                    <label for="nama" class="col-md-3 col-form-label text-md-left">{{ __('Nama ') }}</label>
                    <div class="col-md-10">
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" placeholder="Nama Lengkap" autofocus>
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-5">
                    <label for="tempat_lahir" class="col-md-3 col-form-label text-md-left">{{ __('Tempat Lahir ') }}</label>
                    <div class="col-md-10">
                    <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required autocomplete="tempat_lahir" placeholder="Tempat Lahir" autofocus>
                    @error('tempat_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-5">
                    <label for="jenis_kelamin" class="col-md-3 col-form-label text-md-left">{{ __('Jenis Kelamin') }}</label>
                    <div class="col-md-10">
                         <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="inputGroupSelect01" name="jenis_kelamin" required autocomplete="jenis_kelamin" autofocus>
                         <option value="{{ old('jenis_kelamin') }}" selected>Jenis Kelamin</option>
                        <option value="admin">Admin</option>
                        <option value="psikolog utama">Psikolog Utama</option>
                        <option value="asisten psikolog utama">Asisten Psikolog Utama</option>
                    </select>
                 @error('jenis_kelamin')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                </div>
            </div>
                <div class="form-group row ml-5">
                    <label for="sipp" class="col-md-3 col-form-label text-md-left">{{ __('SIPP ') }}</label>
                    <div class="col-md-10">
                    <input id="sipp" type="text" class="form-control @error('sipp') is-invalid @enderror" name="sipp" value="{{ old('sipp') }}" required autocomplete="sipp" placeholder="Tempat Lahir" autofocus>
                    @error('sipp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                        <div class="form-group row ml-5">
                            <label for="tanggal_lahir" class="col-md-3 col-form-label text-md-left">{{ __('Tanggal Lahir ') }}</label>
                            <div class="col-md-10">
                            <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required autocomplete="tanggal_lahir" placeholder="Tanggal Lahir" autofocus>
                            @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group row ml-5">
                            <label for="jenis_kelamin" class="col-md-3 col-form-label text-md-left">{{ __('Jenis Kelamin') }}</label>
                            <div class="col-md-10">
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="inputGroupSelect01" name="jenis_kelamin" required autocomplete="jenis_kelamin" autofocus>
                        <option value="{{ old('jenis_kelamin') }}" selected>Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                        </div>
                <div class="form-group row ml-5">
                    <label for="alamat" class="col-md-4 col-form-label text-md-left">{{ __('Alamat Lengkap') }}</label>
                    <div class="col-md-10">
                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" placeholder="Alamat" autofocus>
                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-5">
                    <label for="no_hp" class="col-md-4 col-form-label text-md-left">{{ __('Nomor Telepon ') }}</label>
                    <div class="col-md-10">
                    <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" placeholder="No HP" autofocus>
                    @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="form-group row ml-5">
                    <label for="Foto" class="col-md-3 col-form-label text-md-left">{{ __('Foto ') }}</label>
                    <div class="col-md-10">
                    <input type="file" class="form-control
                        @error('foto') is-invalid @enderror" id="foto" placeholder="Masukan foto" 
                        name="foto" value="{{ old('foto') }}">
                            @error('foto')
                            <div class="invalid-feedback">
                                {{$message}}</div>
                                @enderror
                            </div>
                        </div>
                <div class="form-group row ml-5">
                    <label for="password" class="col-md-3 col-form-label text-md-left">{{ __('Password ') }}</label>
                    <div class="col-md-10">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" 
                        required autocomplete="new-password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                        <div class="form-group row ml-5">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Konfirmasi Password') }}</label>
                    <div class="col-sm-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                    </div>
                </div>
                </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection