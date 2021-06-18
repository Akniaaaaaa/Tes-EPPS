@extends('layout/peserta')
@section('container')

<div class="container">
    <div class="card mt-5 bg-gradient-primary">
        <!-- /.card-header -->
        <div class="card-body" background="red">
            <div class="card-body">
                <div class="card text-center">
                    <div class="card-header">
                        {{-- <p id="please"></p> --}}
                        <span class="badge bg-primary" style="width: 50px; height: 30px"><h4 style="color: cornsilk;">{{$soal_nomor}}</h4></span></h1>
                        
                    </div>
                    <div class="card-body" align="left">

                        <form method="post" action="{{route('peserta.jawaban')}}" enctype="multipart/form-data">     
                            @csrf
                            @if (!empty($jawaban))
                            <input type="hidden" name="nomor_soal" value="{{$soal_nomor}}">
                            <input type="radio" name="pilihan" value="A" required <?php if($jawaban=='A'){echo 'checked';}?>><label for="Pilihan_a" > A. {{$soal->Pilihan_a}}</label><br> 
                            <input type="radio" name="pilihan" value="B" required <?php if($jawaban=='B'){echo 'checked';}?>><label for="Pilihan_a"> B. {{$soal->Pilihan_b}}</label><br> 
                            <br>
                            @elseif(empty($jawaban))
                            <input type="hidden" name="nomor_soal" value="{{$soal_nomor}}">
                            <input type="radio" name="pilihan" value="A" required ><label for="Pilihan_a" > A. {{$soal->Pilihan_a}}</label><br> 
                            <input type="radio" name="pilihan" value="B" required><label for="Pilihan_a"> B. {{$soal->Pilihan_b}}</label><br> 
                            <br> 
                            @endif
                            <div>
                                <a>
                                    <button type="submit" class="btn btn-warning" style="size: 5px; color: black">SIMPAN & LANJUTKAN</button>
                                </a>
                               
                                <button type="submit" class="btn btn-danger" style= "color: black" data-toggle="modal" data-target="#selesai">SELESAI</button>
                                
                            </div>
                        </form> 
                    </div>
                    <div class="card-footer text-muted">
                        @foreach ($tb_soal as $ns)
                        {{-- tes --}}
                                 <a href="{{route('soal', $ns->nomor_soal)}}">
                                    <button type="submit" id="change" onchange="changeColor(this.value)" value ="blue" class="btn btn-secondary mb-2" style="width: 60px; height: 30px" >{{$ns->nomor_soal}}</button>
                                 </a>
                                 {{-- lumayan benar --}}
                                    {{-- @if (Request::segment(3) == $loop->iteration)
                                    <a href="{{route('soal', $ns->nomor_soal)}}">
                                        <button type="submit"  class="btn btn-secondary mb-2" style="width: 60px; height: 30px" >{{$ns->nomor_soal}}</button>
                                    </a>
                                    @elseif(request() ->segment(3)  == $ns->nomor_soal_jawaban && $ns->jawaban  != null)
                                    <a href="{{route('soal', $ns->nomor_soal_jawaban)}}">
                                        <button type="submit"  class="btn btn-danger mb-2" style="width: 60px; height: 30px" >{{$ns->nomor_soal}}</button>
                                    </a>
                                    @else
                                    <a href="{{route('soal', $ns->nomor_soal)}}">
                                        <button type="submit"  class="btn btn-primary mb-2" style="width: 60px; height: 30px" >{{$ns->nomor_soal}}</button>
                                    </a>
                                    @endif --}}
{{-- selesai lumayan benar --}}
                                    {{-- @if (!empty($tb_jawaban))
                                    <button type="submit"  class="btn btn-secondary mb-2" style="width: 60px; height: 30px" >{{$ns->nomor_soal}}</button>
                                    @elseif(Request::segment(3) == $loop->iteration)
                                    <button type="submit"  class="btn btn-primary mb-2" style="width: 60px; height: 30px" >{{$ns->nomor_soal}}</button>
                                    @elseif(empty($tb_jawaban))
                                    <button type="submit"  class="btn btn-warning mb-2" style="width: 60px; height: 30px" >{{$ns->nomor_soal}}</button>
                                    @endif --}}
                              
                        @endforeach
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="selesai" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
      <div class="modal-content bg-gradient-primary">
        <div class="modal-header">
          <h5 class="modal-title" style="color: white" id="staticBackdropLabel">Konfirmasi Selesai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="color: white">
            Pilih "Selesai" jika kamu ingin mengakhiri tes ini.
                        <div class="text-right mx-4 my-1 mb-4">
                            @csrf
                            <a
                            type="submit" class="btn btn-danger mt-4 mb-3" href="{{ route('hasil.peserta', Auth::guard('peserta')->id()) }}">Selesai</button>
                            </a>
                            <a>
                            <button type="reset" class="btn btn-danger mt-4 mb-3">Batal</button>
                            </a>
                        </div>
                    </div>
                 </div>
             </form>
        </div>
    </div>
@endsection