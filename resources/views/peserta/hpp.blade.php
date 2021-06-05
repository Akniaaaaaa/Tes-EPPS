<html>

<head>
  <title> Hasil Pemeriksaan Psikologi </title>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Custom fonts for this template-->
  
  <link href="{{ asset('temp/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('temp/assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <style>
        #halaman{
            width: auto; 
            height: auto; 
            position: absolute; 
            border: 4px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
            border-color: rgb(117, 177, 218)
        }
        .border3{
            border-style:dashed;
            border-color:#cc59f9;
            border-width:thick;
        }
    </style>
    
</head>
<body >
    {{-- <img src="{{ asset('images/border.png')}}"   --}}
    {{-- <p img="images/border.png"> --}}
  {{-- <font face="Arial" color="black"> <p align="center"> PEMERINTAH KOTA CIREBON </p></font> --}}
  {{-- <font face="Times New Roman" color="blue"> <p align="center"> PERUSAHAAN PENYEWAAN MOBIL KOTA BENGKULU</p></font> --}}
  <div id=halaman>
    <img src="{{ asset('temp/assets/img/sahabatkarir.png')}}" style="width: 100px; height: 100px;"/>
  <font face="Times New Roman" color="BLACK" size=4>
    <p align="center"><b> People Psychology Consulting</b></p>
  </font>
  <font face="Times New Roman" color="BLACK" size=3>
    <p align="center"> SAHABAT PSIKOLOGI</p>
  </font>
  {{-- <font face="Arial" color="green"> <p align="center"> PERMATA RENTAL </p></font> --}}
  <font face="Times New Roman" color="black" size="2">
    <p align="center"> <i>Alamat. Jl. Hibrida raya ujung rt.08./02 no.07 kel. Pagar dewa Kec. Selebar kota bengkulu </i></p>
  </font>
  <font face="Times New Roman" color="black" size="1">
    <p align="center"> <i>0823-8000-8887</i></p>
  </font>
  <hr>
  <font face="Arial" color="BLACK" size="4">
    <p align="center"> <u> <b> HASIL PEMERIKSAAN PSIKOLOGI </b></u>
  </font><br>
  {{-- <font face="Arial" color="red" size="4"> Nomer: 8021/SMKN1/2015 </p></font> --}}

  <p align="center">
    {{Auth::user()->name}}

  </p>
  <p align="center">
  <center><table class="table" style="background-color: cornflowerblue; width: 80%; font-color: white">
    <tr>
        <td style="width: 30%; color:white">TEMPAT/ TANGGAL LAHIR</td>
        <td style="width: 5%; color:white">:</td>
        <td style="width: 30%; color:white">{{$hasil->tempat_lahir}}/ {{$hasil->tanggal_lahir}}</td>
    </tr>
    <tr>
        <td style="width: 30%; color:white" vertical-align: top;">JENIS KELAMIN</td>
        <td style="width: 5%; color:white" vertical-align: top;">:</td>
        <td style="width: 30%; color:white">{{$hasil->jenis_kelamin}}</td>
    </tr>

    <tr>
        <td style="width: 30%;color:white">TANGGAL PEMERIKSAAAN</td>
        <td style="width: 5%;color:white">:</td>
        <td style="width: 30%;color:white"></td>
    </tr>
</table></center>



  </p>
  {{-- tabel hasil --}}
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: black">
    <tr align ="center">
        <th style="color: white">KEBUTUHAN</th>
        <th>KATEGORI</th>
        <th>KETERANGAN</th>
    </tr>

        <tr>
            
        </tr>


</table>
</div>
<div class="form-group">
    <label style="color: black">Deskripsi HPP</label>
    <input type="textarea" name="deskripsihpp" class="form-control" value="{{$hasil->deskripsihpp}}" style="width:300px">
<input type="hidden" name="id_psikolog" class="form-control" value="{{1}}" style="width:300px">
</div>  
 

  <p align="right">
    ..........,..............................
    <br>
    Penyewa,
    <p>





    </p>
    <br>
    <p align="right">
      (.........................................)
    </p>

    {{-- <script type="text/javascript">
      window.print();
    </script> --}}
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('temp/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('temp/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('temp/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('temp/assets/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{ asset('temp/assets/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('temp/assets/js/demo/chart-area-demo.js')}}"></script>
<script src="{{ asset('temp/assets/js/demo/chart-pie-demo.js')}}"></script>

<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
</body>

</html>