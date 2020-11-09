@extends('user.base')

@php
$uri = Request::segment(2);
$uri = strpos($uri,'%2F')?str_replace('%2F','%252F',$uri):$uri;
@endphp

@section('title')
- {{ucwords(Request::segment(1))}}
@endsection

@section('menu')
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
<header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
        <ul>
            <li><a href="{{route('lineUpDetail',['brand'=>Request::segment(1),'detail'=>$uri])}}"><i class="bx bx-arrow-back"></i> <span>Kembali</span></a></li>
            <br>
            <li><a href="{{route('home')}}"><i class="bx bx-home"></i> <span>Beranda</span></a></li>
            <li class="active"><a href="#contact"><i class="bx bxs-car"></i> <span>Line Up</span></a></li>
            <br>
            <li><a href="{{route('profil')}}"><i class="bx bx-user"></i> <span>Profil</span></a></li>
            <li><a href="{{route('transaksi')}}"><i class="bx bxs-basket"></i> <span>Transaksi</span></a></li>
            <br>
            <li><a href="{{route('logout')}}"><i class="bx bx-log-out-circle"></i> <span>Keluar</span></a></li>
        </ul>
    </nav>

</header>
@endsection

@section('style')
<style>
    /* begin:: untuk background dinamis */
    body {
        width: 100%;
        height: 100vh;
        background: url("{{$backgroundImage}}") top right no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    /* end:: untuk background dinamis */

    /* begin:: untuk overlay */
    /* body:before {
        content: "";
        background: rgba(255, 255, 255, 0.5);
        position: fixed;
        z-index: -1;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    } */
    /* end:: untuk overlay */
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
                    @if($data['interior']!=="")
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{$data['interior']}}" allowfullscreen></iframe>
                    </div>
                    @else
                    <p>Belum ada gambar</p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 portfolio-item">
                    <h3 class="resume-title">Exterior 360&deg;</h3>
                    @if($data['exterior']!=="")
                    <div class="cloudimage-360" data-folder="{{$baseImg}}otomotif/360ex/" data-image-list="[{{htmlspecialchars_decode($data['exterior'])}}]" data-bottom-circle data-bottom-circle-offset="2" data-full-screen="true"></div>
                    @else
                    <p>Belum ada gambar</p>
                    @endif
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