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
            <li class="active"><a href="#resume"><i class="bx bxs-car"></i> <span>Line Up</span></a></li>
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
    <section id="resume" class="resume portfolio">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="section-title">
                <h2>{{$sectionTitle}}</h2>
            </div>

            <div class="row portfolio-container">
                @foreach($data as $v)
                @php
                $uri = urlencode($v->nama);
                $uri = strpos($uri,'%2F')?str_replace('%2F','%252F',$uri):$uri;
                @endphp
                <div class="{{count($data)<6?'col-lg-6':'col-lg-4'}} col-md-6 portfolio-item">
                    <div class="portfolio-wrap zoom_img" style="background-color: transparent;">
                        <img src="{{$baseImg.'otomotif/'.$v->gambar}}" width="100%" height="{{count($data)<6?'300px':'200px'}}" style="object-fit: contain;">
                        <a href="{{route('lineUpDetail',['brand'=>Request::segment(1),'detail'=>$uri])}}">
                            <div class="portfolio-info"></div>
                            <h3 class="resume-title" style="text-align: center;">{{$v->nama}}</h3>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
</script>
@endsection