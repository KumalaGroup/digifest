@extends('user.base')

@section('title')
- {{ucwords(Request::segment(1))}}
@endsection

@section('menu')
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
<header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
        <ul>
            <li><a href="{{route('home')}}"><i class="bx bx-home"></i> <span>Beranda</span></a></li>
            <li><a href="{{route('mainStage',['brand'=>Request::segment(1)])}}"><i class="bx bx-layer"></i> <span>Main Stage</span></a></li>
            <li><a href="{{route('rundown',['brand'=>Request::segment(1)])}}"><i class="bx bx-detail"></i> <span>Rundown</span></a></li>
            <li class="active"><a href="#resume"><i class="bx bx-line-chart"></i> <span>Line Up</span></a></li>
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
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="section-title">
                <h2>{{$sectionTitle}}</h2>
            </div>

            <div class="row portfolio-container" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap zoom_img">
                        <img src="{{asset('assets/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h3 class="resume-title">Confero</h3>
                            <div class="portfolio-links">
                                <a href="{{asset('assets/img/portfolio/portfolio-4.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Confero"><i class="bx bx-plus"></i></a>
                                <a href="{{route('lineUpDetail',['brand'=>Request::segment(1),'detail'=>'confero'])}}"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap zoom_img">
                        <img src="{{asset('assets/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h3 class="resume-title">Confero</h3>
                            <div class="portfolio-links">
                                <a href="{{asset('assets/img/portfolio/portfolio-6.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Confero"><i class="bx bx-plus"></i></a>
                                <a href="{{route('lineUpDetail',['brand'=>Request::segment(1),'detail'=>'confero'])}}"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap zoom_img">
                        <img src="{{asset('assets/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h3 class="resume-title">Confero</h3>
                            <div class="portfolio-links">
                                <a href="{{asset('assets/img/portfolio/portfolio-7.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Confero"><i class="bx bx-plus"></i></a>
                                <a href="{{route('lineUpDetail',['brand'=>Request::segment(1),'detail'=>'confero'])}}"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap zoom_img">
                        <img src="{{asset('assets/img/portfolio/portfolio-8.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h3 class="resume-title">Confero</h3>
                            <div class="portfolio-links">
                                <a href="{{asset('assets/img/portfolio/portfolio-8.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Confero"><i class="bx bx-plus"></i></a>
                                <a href="{{route('lineUpDetail',['brand'=>Request::segment(1),'detail'=>'confero'])}}"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                    <div class="portfolio-wrap zoom_img">
                        <img src="{{asset('assets/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h3 class="resume-title">Confero</h3>
                            <div class="portfolio-links">
                                <a href="{{asset('assets/img/portfolio/portfolio-9.jpg')}}" data-gall="portfolioGallery" class="venobox" title="Confero"><i class="bx bx-plus"></i></a>
                                <a href="{{route('lineUpDetail',['brand'=>Request::segment(1),'detail'=>'confero'])}}"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
</script>
@endsection