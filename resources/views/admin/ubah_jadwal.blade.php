@extends('layout/admin')
@section('container')

<div class="container">
    <div class="card shadow mb-4 ml-90 mt4">
        <div class="card-header py-3">
           <center>
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <h4 class="m-0 font-weight-bold text-primary">Ubah Jadwal Tes EPPS</h4>
           </center>
        </div>
        <div class="row ml-5">
          <div class="col-10 ml-5">
              
              <div class=" mt-4 ml-5">
                    <form method="post" action="{{route('store_ubah_jadwal', $tb_jadwal->id_jadwal)}}"  enctype="multipart/form-data">
                        @csrf
                        {{-- @method('patch') --}}
                        <div class="row">
                            <div class="col-md-10">      
                                Ubah Jadwal Untuk Peserta 
                                <h5>{{ $tb_jadwal->nama }}</h5>
                                <div class="form-group ml-2 mt-2">
                                    <label for="tanggal_tes">Tanggal Tes</label>
                                    <input type="date" class="form-control @error('tanggal_tes') is-invalid 
                            @enderror" id="tanggal_tes" placeholder="Masukkan pilihan A" name="tanggal_tes" value="{{ $tb_jadwal->tanggal_tes }}">
                                    @error('tanggal_tes')
                                    <div class="invalid-feedback">
                                        {{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group ml-2">
                                    <label for="jam_tes">Jam</label>
                                    <input type="time" class="form-control @error('jam_tes') is-invalid 
                            @enderror" id="jam_tes" placeholder="Masukkan pilihan A" name="jam_tes" value="{{  $tb_jadwal->jam_tes }}">
                                    @error('jam_tes')
                                    <div class="invalid-feedback">
                                        {{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group ml-2">
                                    <label for="jam_selesai">Jam Selesai</label>
                                    <input type="time" class="form-control @error('jam_selesai') is-invalid 
                            @enderror" id="jam_selesai" placeholder="Masukkan pilihan A" name="jam_selesai" value="{{  $tb_jadwal->jam_selesai }}">
                                    @error('jam_selesai')
                                    <div class="invalid-feedback">
                                        {{$message}}</div>
                                    @enderror
                                </div>
                                
                                    {{-- <div class="form-group ml-2">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Pilih</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            foreach ($tb_peserta as $u) : ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $u->nama ?></td>
                                                    <td>
                                                        <input type="checkbox" class="mt-2" name="jadwal[]" value="{{ $tb_jadwal->id_peserta}}">
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                </table>
                                    </div> --}}
                                <div class="text-right mx-4 my-1 mb-4">
                                    <button type="submit" class="btn btn-dark mt-4 mb-3">Simpan</button>
                                    <button type="reset" class="btn btn-danger mt-4 mb-3">Reset</button>
                                </div>
                            </div>
                         </div>            
                    </form>
                </table>
            </div>
        </div>
      </div>
  </div>
  <!-- /.container-fluid -->
</div>



@endsection