<!DOCTYPE html>
<html lang="en">

<head>
    <title>Elearning SMPN1Lohbener</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="{{asset('apple-touch-icon" href="assets/img/apple-icon.png')}}">
    <link rel="{{asset('shortcut icon" type="image/x-icon" href="assets/img/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
 

</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg navbar-light d-none d-lg-block" id="templatemo_nav_top" style="background-color: darkblue;">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:smpnsatulohbener@yahoo.co.id">smpnsatulohbener@yahoo.co.id</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:0234-276850">0234-276850</a>
                </div>
                <div>
              <a class="text-light" href="" target="_blank" rel="sponsored">
                @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::user() && Auth::user()->hasRole('Admin'))
                        <a href="{{ url('/Okemin') }}">Home</a>

                    @elseif (Auth::user() && Auth::user()->hasRole('Teacher'))
                        <a href="{{ url('/Teacher') }}">Home</a>

                    @elseif (Auth::user() && Auth::user()->hasRole('Student'))
                        <a href="{{ url('/Student') }}">Home</a>

                    @else
                        <div class="login"> <a href="{{ route('login') }}" style="color: white; font-size:20%"><i class="fas fa-user me-2"></i>Login</a></div>
                    @endif
                </div>
            @endif
                    
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text logo h1 align-self-center font-" href="/index" style="color: darkblue; ">
                E-learning
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            
            <div class="pull-right">
                <a class="text-light" href="https://fb.com/SMPN1Lohbener" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://instagram.com/smpn1lohbener?utm_medium=copy_link" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{asset('assets/img/banner_img_01.jpg')}}" height="400" width="450" align="right" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text" style="color: darkblue">What's E-learning??</h1>
                                <p>
                                E-Learning adalah pembelajaran jarak jauh (distance Learning) dengan menggunakan media elektronik, 
                                khususnya menggunakan jaringan Internet sebagai sarana pembelajarannya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{asset('assets/img/saloh.jpg')}}" height="500" width="500" align="right" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text" style="color: darkblue;">SMPN 1 LOHBENER</h1>
                                adalah salah satu pendidikan dengan jenjang SMP di Pamayahan, Kec. Lohbener, Kab. Indramayu, 
                                Jawa Barat. Dalam menjalankan kegiatannya, SMP NEGERI 1 LOHBENER berada di bawah naungan Kementerian 
                                Pendidikan dan Kebudayaan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{asset('assets/img/banner_img_01.jpeg')}}" height="300" width="300" align="right" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text" style="color: darkblue">VISI DAN MISI SMPN 1 Lohbener</h1>
                                <b>VISI:</b>
                                <p>Meningkatkan mutu sekolah berlandaskan Imtaq dan Iptek. Indikator, Religius, Aktif, Prestasi, Inovatif dan Handal <b>(RAPIH)</b><br>
                                    </p>
                                <b>MISI:</b><br>
                                1. Melaksanakan pembelajaran dan bimbingan secara efektif, kreatif, inovatif untuk meningkatkan potensi siswa<br>
                                2. Melaksanakan nuansa religius (Islami) bagi seluruh warga sekolah<br>
                                3. Menciptakan suasana yang kondusif untuk keefektifan seluruh kegiatan sekolah<br>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="{{asset('assets/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/templatemo.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <!-- End Script -->
</body>

</html>