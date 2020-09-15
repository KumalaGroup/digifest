@extends('user.base')

@section('title')
- {{ucwords(Request::segment(1))}}
@endsection

@section('menu')
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
<header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
        <ul>
            <li><a href="{{route('lineUpDetail',['brand'=>Request::segment(1),'detail'=>Request::segment(3)])}}"><i class="bx bx-arrow-back"></i> <span>Kembali</span></a></li>
            <br>
            <li><a href="{{route('home')}}"><i class="bx bx-home"></i> <span>Beranda</span></a></li>
            <li><a href="{{route('mainStage',['brand'=>Request::segment(1)])}}"><i class="bx bx-layer"></i> <span>Main Stage</span></a></li>
            <li><a href="{{route('rundown',['brand'=>Request::segment(1)])}}"><i class="bx bx-detail"></i> <span>Rundown</span></a></li>
            <li><a href="{{route('lineUp',['brand'=>Request::segment(1)])}}"><i class="bx bx-line-chart"></i> <span>Line Up</span></a></li>
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
    <section id="contact" class="contact resume portfolio">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="section-title">
                <h2>{{$sectionTitle}}</h2>
            </div>
            <div class="row">
                <div class="col-md-12 portfolio-item">
                    <h3 class="resume-title">Interior 360&deg;</h3>
                    <div class="cloudimage-360" data-folder="https://scaleflex.cloudimg.io/crop/1920x700/n/https://cdn.scaleflex.it/demo/360-car/" data-filename="iris-{index}.jpeg" data-amount="36" data-spin-reverse data-bottom-circle data-bottom-circle-offset="2" data-full-screen="true" data-autoplay></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="resume-title">Exterior 360&deg;</h3>
                    <div class="cloudimage-360" data-folder="https://scaleflex.cloudimg.io/crop/1920x700/n/https://cdn.scaleflex.it/demo/360-car/" data-filename="iris-{index}.jpeg" data-amount="36" data-spin-reverse data-bottom-circle data-bottom-circle-offset="2" data-full-screen="true" data-autoplay></div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script src="https://cdn.scaleflex.it/plugins/js-cloudimage-360-view/2/js-cloudimage-360-view.min.js"></script>
<script>
</script>
@endsection