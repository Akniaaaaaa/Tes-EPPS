@extends('layout/admin')
@section('container')

<div class="container">
    <div class="card shadow mb-4 ml-90 mt4">
        <div class="card-header py-3">
           <center>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}
            <h3 class="m-0 font-weight-bold text-primary">Form Tambah Data Soal EPPS</h3>
           </center>
        </div>
        <div class="row ml-5">
            <div class="col-10 ml-5">
                
                <div class=" mt-4 ml-5">
              
                    <form method="post" action="/admin/soal" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label for="nomor_soal">Nomor Soal</label>
                                    <input type="text" class="form-control @error('nomor_soal') is-invalid 
                            @enderror" id="nomor_soal" placeholder="Masukkan Tipe" name="nomor_soal" value="{{  old('tipe') }}">
                                    @error('nomor_soal')
                                    <div class="invalid-feedback">
                                        {{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group ml-2">
                                    <label for="pilihan_a">Pilihan A</label>
                                    <input type="text" class="form-control @error('pilihan_a') is-invalid 
                            @enderror" id="pilihan_a" placeholder="Masukkan pilihan A" name="pilihan_a" value="{{  old('pilihan_a') }}">
                                    @error('pilihan_a')
                                    <div class="invalid-feedback">
                                        {{$message}}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group ml-2">
                                    <label for="pilihan_b">Pilihan B</label>
                                    <input type="text" class="form-control @error('pilihan_b') is-invalid @enderror" id="pilihan_b" placeholder="Masukan pilihan_b" name="pilihan_b" value="{{ old('pilihan_b') }}">
                                    @error('pilihan_b')
                                    <div class="invalid-feedback">
                                        {{$message}}</div>
                                        @enderror
                                    </div>
                               

                                <div class="text-right mx-4 my-1 mb-4">
                                    <button type="submit" class="btn btn-dark mt-4 mb-3">Simpan</button>
                                    <button type="reset" class="btn btn-danger mt-4 mb-3">Reset</button>
                                </div>
                            </div>
                         </div>
                     </form>
                            
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
                    @endsection