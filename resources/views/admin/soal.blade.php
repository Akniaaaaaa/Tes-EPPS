@extends('layout/admin')
@section('container')
<div class="container">
    <div class="card">
        <div class="card-header " style="color:blue">
            <center>
                <h3 class="m-0 font-weight-bold text-primary">Data Soal EPPS </h3>
               </center>        
            </div>
        <!-- /.card-header -->
       
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_soal">Tambah Soal</button>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pilihan A</th>
                        <th scope="col">Pilihan B</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tb_soal as $p) : ?>
                        <tr>
                            <td><?php echo $p->nomor_soal ?></td>
                            <td><?php echo $p->Pilihan_a ?></td>
                            <td><?php echo $p->Pilihan_b ?></td>
                            {{-- <td><a href="{{ route('pelajaran.nilai', $p->id_pelajaran) }}" 
                                class="btn btn-sm btn-primary" style="color: white; cursor: pointer;">
                                <i class="fas fa-info"></i></a>
                            </td> --}}
                            <td>
                                @csrf
                                <a href="/admin/{{$p->nomor_soal}}/edit_soal" 
                                    class="btn btn-sm btn-primary" style="color: white; cursor: pointer;"
                                    data-target="#edit_soal">
                                    <i class="fas fa-edit"></i></a>
                            </td> 
                            <td>
                                @method('delete')
                                @csrf
                                <a href="/admin/{{$p->nomor_soal}}/hapus_soal"
                                    class="btn btn-sm btn-primary" style="color: white; cursor: pointer;"
                                    onclick="return confirm('Apakah Ingin Menghapus Data Mobil ini ?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td> 
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            {{$tb_soal->links("pagination::bootstrap-4")}}
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
</div>

  
  <!-- Modal -->
  <div class="modal fade" id="tambah_soal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Soal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="/admin/soal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                     
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
                            <input type="text" class="form-control @error('Pilihan B') is-invalid @enderror" id="pilihan_b" placeholder="Masukan pilihan_b" name="pilihan_b" value="{{ old('pilihan_b') }}">
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
    </div>
  <!-- Modal -->
  <div class="modal fade" id="edit_soal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Soal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="/admin/soal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-10">
                     
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
                            <input type="text" class="form-control @error('Pilihan B') is-invalid @enderror" id="pilihan_b" placeholder="Masukan pilihan_b" name="pilihan_b" value="{{ old('pilihan_b') }}">
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
    </div>

  
@endsection