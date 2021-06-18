@extends('layout.plain')
@section('container')
<body class="bg-gradient-primary">
<div class="container">
    <center>
<div class="col-10">        
    <div class="card o-hidden border-1 shadow-lg my-5 mt-5 " style="width: 60rem; align: center;">
        <div class="card-body p-10">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Nested Row within Card Body -->
            <form method="POST" action="{{ route('peserta/store_akun') }}" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                </div>
                <div class="row ">
                    <div class="col-6 ">
                <form >
                    <div class="form-group row ml-3">
                        <label for="email">{{ __('Email Anda ') }}</label>
                        <div class="col-md-10">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ml-3">
                        <label for="nama">{{ __('Nama Lengkap Anda') }}</label>
                        <div class="col-md-10">
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" placeholder="Nama Lengkap" autofocus>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group row ml-3">
                        <label for="nama_pengguna">{{ __('Nama Pengguna ') }}</label>
                        <div class="col-md-10">
                        <input id="nama_pengguna" type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" name="nama_pengguna" value="{{ old('nama_pengguna') }}" required autocomplete="nama_pengguna" placeholder="Nama Pengguna" autofocus>
                        @error('nama_pengguna')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group row ml-3">
                        <label for="tempat_lahir">{{ __('Tempat Lahir ') }}</label>
                        <div class="col-md-10">
                        <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required autocomplete="tempat_lahir" placeholder="Tempat Lahir" autofocus>
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>
                            <div class="form-group row ml-3">
                                <label for="tanggal_lahir">{{ __('Tanggal Lahir ') }}</label>
                                <div class="col-md-10">
                                <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required autocomplete="tanggal_lahir" placeholder="Tanggal Lahir" autofocus>
                                @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            </div>
                            <div class="form-group row ml-3">
                                <label for="jenis_kelamin">{{ __('Jenis Kelamin') }}</label>
                                <div class="col-md-10">
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="inputGroupSelect01" name="jenis_kelamin" required autocomplete="jenis_kelamin" autofocus>
                                        <option value="{{ old('jenis_kelamin') }}" selected>Jenis Kelamin</option>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                                <div class="col-6 ">
                    <div class="form-group row ">
                        <label for="alamat" >{{ __('Alamat Lengkap') }}</label>
                        <div class="col-md-10">
                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" placeholder="Alamat" autofocus>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group row ">
                        <label for="no_hp" >{{ __('Nomor Telepon ') }}</label>
                        <div class="col-md-10">
                        <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" placeholder="No HP" autofocus>
                        @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group row ">
                        <label for="Foto">{{ __('Foto Bukti Pembayaran ') }}</label>
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
                    {{-- <div class="form-group row ">
                        <label for="Foto">{{ __('Foto Bukti Pembayaran ') }}</label>
                        <div class="col-md-10">
                        <input type="file" class="form-control
                            @error('foto_pembayaran') is-invalid @enderror" id="foto_pembayaran" placeholder="Masukan foto_pembayaran" 
                            name="foto_pembayaran" value="{{ old('foto_pembayaran') }}">
                                @error('foto_pembayaran')
                                <div class="invalid-feedback">
                                    {{$message}}</div>
                                    @enderror
                                </div>
                            </div> --}}
                    <div class="form-group row ">
                        <label for="password" >{{ __('Masukkan Password ') }}</label><br>
                        <div class="col-sm-10">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" 
                            required autocomplete="new-password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                            <div class="form-group row ">
                                <label for="password-confirm">{{ __('Konfirmasi Password ') }}</label>

                        <div class="col-sm-10">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                        </div>
                    </div>
                    </div>
                </div>
                    <div class="form-group row ">
                        <div class="col-sm-10">
                        </div>
                        <button type="submit" class="btn btn-dark btn-user btn-block">
                            Buat Akun
                        </button>
                    </div>
                    <!-- <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div> -->
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Sudah punya akun</a>
                    </div>
                </center>
        </div>
    </div>
</div>
</div>

@endsection
