@extends('layout.plain')
@section('container')
<body class="bg-gradient-primary">
<div class="container">
    <center>
    <div class="card o-hidden border-1 shadow-lg my-5 mt-5 " style="width: 40rem; align: center;">
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
            <form method="POST" action="{{ route('peserta/simpan_perubahan', Auth::guard('peserta')->id()) }}" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Ubah Akun</h1>
                </div>
                <form >
                    <div class="form-group row ml-5">
                        <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('E-Mail ') }}</label>
                        <div class="col-md-10">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $peserta->email }}" required autocomplete="email" placeholder="Alamat Email">
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
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $peserta->nama}}" required autocomplete="nama" placeholder="Nama Lengkap" autofocus>
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
                        <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ $peserta->tempat_lahir}}" required autocomplete="tempat_lahir" placeholder="Tempat Lahir" autofocus>
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>
                            <div class="form-group row ml-5">
                                <label for="tanggal_lahir" class="col-md-3 col-form-label text-md-left">{{ __('Tanggal Lahir ') }}</label>
                                <div class="col-md-10">
                                <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ $peserta->tanggal_lahir }}" required autocomplete="tanggal_lahir" placeholder="Tanggal Lahir" autofocus>
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
                            <option value="{{ $peserta->jenis_kelamin}}" selected>{{ $peserta->jenis_kelamin}}</option>
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
                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $peserta->alamat }}" required autocomplete="alamat" placeholder="Alamat" autofocus>
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
                        <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ $peserta->no_hp }}" required autocomplete="no_hp" placeholder="No HP" autofocus>
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
                            name="foto" value="{{ $peserta->foto }}">
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
                            required autocomplete="new-password" placeholder="Password" value="{{$peserta->password}}">
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
                            <input id="password-confirm" type="password" class="form-control" value="{{$peserta->password_confirmation}}" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                        </div>
                    </div>
                    </div>
                    <div class="form-group row ml-5">
                        <div class="col-sm-10">
                    <button type="submit" class="btn btn-dark btn-user btn-block">
                        Simpan
                    </button>
                        </div>
                    </div>
                 
                </center>
        </div>
    </div>
</div>

@endsection
