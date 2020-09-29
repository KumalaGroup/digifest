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
            <li><a href="{{route('home')}}"><i class="bx bx-home"></i> <span>Beranda</span></a></li>
            <li><a href="{{route('lineUp',['brand'=>Request::segment(1)])}}"><i class="bx bx-line-chart"></i> <span>Line Up</span></a></li>
            <br>
            <li><a href="{{route('profil')}}"><i class="bx bx-user"></i> <span>Profil</span></a></li>
            <li><a href="{{route('logout')}}"><i class="bx bx-log-out-circle"></i> <span>Keluar</span></a></li>
        </ul>
    </nav>

</header>
@endsection

@section('style')
<style>
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
                <div class="col-lg-7">
                    <div class="row portfolio-container" data-aos="zoom-in" data-aos-delay="100">
                        <div class="col-lg-12 portfolio-item">
                            <div class="zoom_img" style="background-color: transparent;">
                                <img src="{{$baseImg.(empty($data->warna)?'otomotif/'.$data->detail->gambar:'otomotif/warna/'.$data->warna[0]->gambar)}}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 my-auto">
                    <div class="info" style="background-color: transparent;">
                        <div class="address zoom_img">
                            <i class="bx bx-reset"></i>
                            <h4 style="padding-top: 10px;"><a href="{{route('interiorExterior',['brand'=>Request::segment(1),'detail'=>$uri])}}" style="color: #45505b;">Interior & Exterior 360&deg;</a></h4>
                        </div>
                        <div class="email zoom_img">
                            <i class="bx bxs-car"></i>
                            <h4 style="padding-top: 10px;"><a href="{{route('testDrive',['brand'=>Request::segment(1),'detail'=>$uri])}}" style="color: #45505b;">Test Drive Virtual</a></h4>
                        </div>

                        <div class="phone zoom_img">
                            <i class="bx bxs-bookmark"></i>
                            <h4 style="padding-top: 10px;"><a href="{{route('penawaran',['brand'=>Request::segment(1),'detail'=>$uri])}}" style="color: #45505b;">Transaksi</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="resume-title"><small><strong>Mulai dari</strong></small>
                        <span class="text-primary">IDR {{number_format($data->detail->harga,0,"",".")}},-</span></h3>
                    <p>{{$data->detail->deskripsi}}</p>
                </div>
                <div class="col-md-12">
                    <h3 class="resume-title">Spesifikasi</h3>
                    <div class="row">
                        @foreach($data->spesifikasi as $v)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="resume-item zoom_img">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{$v->nama_detail}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$v->deskripsi}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
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