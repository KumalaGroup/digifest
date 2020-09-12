@extends('base')

@section('title')
@endsection

@section('menu')
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
<header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
        <ul>
            <li class="active"><a href="#resume"><i class="bx bx-home"></i> <span>Beranda</span></a></li>
            <br>
            <li><a href=""><i class="bx bx-user"></i> <span>Profil</span></a></li>
            <li><a href="{{route('login')}}"><i class="bx bx-log-out-circle"></i> <span>Keluar</span></a></li>
        </ul>
    </nav>

</header>
@endsection

@section('style')
<style>
    body {
        width: 100%;
        height: 100vh;
        background: url("{{asset('assets/img/'.$backgroundImage)}}") top right no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    body:before {
        content: "";
        background: rgba(255, 255, 255, 0.8);
        position: fixed;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    }
</style>
@endsection

@section('content')
<div id="main">
    <section id="resume" class="resume portfolio">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Kumala Virtual Fair</h2>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap zoom_img py-4" style="background-color: transparent;">
                        <img src="{{asset('assets/images/logo/logo_wuling.png')}}" width="100%" height="100px" style="object-fit: contain;">
                        <a href="{{route('mainStage',['brand'=>'wuling'])}}">
                            <div class="portfolio-info">
                                <h3 class="resume-title">Wuling</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap zoom_img py-4" style="background-color: transparent;">
                        <img src="{{asset('assets/images/logo/logo_hino.png')}}" width="100%" height="100px" style="object-fit: contain;">
                        <a href="{{route('mainStage',['brand'=>'hino'])}}">
                            <div class="portfolio-info">
                                <h3 class="resume-title">Hino</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap zoom_img py-4" style="background-color: transparent;">
                        <img src="{{asset('assets/images/logo/logo_mercedes.png')}}" width="100%" height="100px" style="object-fit: contain;">
                        <a href="{{route('mainStage',['brand'=>'mercedes'])}}">
                            <div class="portfolio-info">
                                <h3 class="resume-title">Mercedes</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap zoom_img py-4" style="background-color: transparent;">
                        <img src="{{asset('assets/images/logo/logo_honda.png')}}" width="100%" height="100px" style="object-fit: contain;">
                        <a href="{{route('mainStage',['brand'=>'honda'])}}">
                            <div class="portfolio-info">
                                <h3 class="resume-title">Honda</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap zoom_img py-4" style="background-color: transparent;">
                        <img src="{{asset('assets/images/logo/logo_mazda.png')}}" width="100%" height="100px" style="object-fit: contain;">
                        <a href="{{route('mainStage',['brand'=>'mazda'])}}">
                            <div class="portfolio-info">
                                <h3 class="resume-title">Mazda</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
@endsection

@section('js')
@endsection