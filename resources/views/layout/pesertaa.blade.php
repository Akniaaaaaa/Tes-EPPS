<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Sahabat Psikologi</title>
    
    <!-- Custom fonts for this template-->
    <link rel="icon" href="{{ asset('appwebsite/gambar/sahabat_psikologi.png')}}" type="image/x-icon">
    <link href="{{url('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="{{url('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">
    
    <div id="wrapper">        
        
        <div id="content-wrapper" class="d-flex flex-column">
            
            <div id="content">
                
                <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <ul class="navbar-nav ml-auto">
                        <input type="hidden" value="{{ auth()->user()->id }}" id="authUser">
                        
                        {{-- <li class="nav-item">
                            <a class="nav-link active" style="color: white; text-transform: uppercase;" aria-current="page" href="{{ url('/peserta/petunjuk') }}">PETUNJUK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id = "demo" style="color: white" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white" href="{{ url('/peserta/hasil/{id}') }}">HASIL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white" href="{{ url('/peserta/jadwal') }}">JADWAL</a>
                            {{-- <p id="demo"></p> 
                        </li> --}}
                        
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-white-600 small" style="color: white; text-transform: uppercase;" >
                                <?php $peserta= App\Models\Peserta::where('id',Auth::guard('peserta')->id())->first();?>{{$peserta->nama}}</span>
                                <img class="img-profile rounded-circle"
                                src="{{ asset('storage/unggah/Profile/Peserta/' . $peserta->foto) }}">
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('profile.peserta', Auth::guard('peserta')->id()) }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    
                </ul>
                
            </nav>
            
            <div class="container-fluid">
                
                @yield('container')
                
            </div>
            
        </div>
        
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Sahabat Psikologi 2021</span>
                </div>
            </div>
        </footer>
        
    </div>
    
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Pilih "Logout" jika kamu ingin keluar dari website ini.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
</div>
</div>

<script src="{{url('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{url('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<script src="{{url('admin/js/sb-admin-2.min.js')}}"></script>

<script src="{{url('admin/vendor/chart.js/Chart.min.js')}}"></script>

<script src="{{url('admin/js/demo/chart-area-demo.js')}}"></script>
<script src="{{url('admin/js/demo/chart-pie-demo.js')}}"></script>

</body>
</html>