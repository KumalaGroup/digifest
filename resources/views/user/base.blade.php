<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kumala Virtual Fair @yield('title')</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/images/logo.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    @yield('style')
</head>

<body>
    @yield('menu')

    @yield('content')

    <footer id="footer" style="background-color: white;">
        <div class="container mt-3" data-aos="zoom-in">
            <div class="row">
                <div class="col-5 col-sm-4 col-md-3 col-lg-2 mx-auto">
                    <img src="https://kumalagroup.id/assets/baru/img/logo.png" class="img_fluid mb-4" width="100%" alt="">
                </div>
                <div class="col-md-6 col-lg-8">
                    <p class="mb-4">Didirikan pada tahun 1983, Kumala Group adalah salah satu perusahaan bisnis terbesar di sisi timur Indonesia. Kumala Group membangun perusahaan yang kompetitif dengan mengembangkan kerjasama yang saling menguntungkan antara merek-merek terkemuka nasional dan internasional di berbagai bidang.</p>
                </div>
                <div class="col-md-3 col-lg-2">
                    <div class="social-links mb-4">
                        <a href="https://www.facebook.com/kumalagroup1/" class="facebook" target="_blank" rel="noopener noreferrer"><i class="bx bxl-facebook"></i></a>
                        <a href="https://www.instagram.com/kumalagroup/" class="instagram" target="_blank" rel="noopener noreferrer"><i class="bx bxl-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UC7R09sGLSsz-Ky1nQs1Qbiw" class="youtube" target="_blank" rel="noopener noreferrer"><i class="bx bxl-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="copyright">
                &copy; Copyright <strong><span>IT Kumala Group</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>
    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
    <script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/vendor/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/vendor/typed.js/typed.min.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    @yield('js')
</body>

</html>