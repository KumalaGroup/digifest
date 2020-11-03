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
            <li><a href="{{route('lineUp',['brand'=>Request::segment(1)])}}"><i class="bx bx-arrow-back"></i> <span>Kembali</span></a></li>
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
    .error {
        color: red;
        padding-top: 5px;
        margin: 0;
        font-size: 10pt;
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
                <div class="col-lg-7">
                    @if(!empty($data->warna))
                    <div class="owl-carousel owl-theme">
                        @foreach ($data->warna as $v)
                        <div class="item">
                            <div class="row portfolio-container">
                                <div class="col-lg-12 portfolio-item">
                                    <div class="zoom_img" style="background-color: transparent;">
                                        <img src="{{$baseImg.'otomotif/warna/'.$v->gambar}}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if(count($data->warna)>1)<div class="text-center">
                        <div id="pilihan_warna" class="portfolio-item">
                            @foreach ($data->warna as $v)
                            <a class="btn_round btn-sm mx-1" data-nama="{{$v->nama_warna}}" style="background-color: #{{$v->deskripsi}}; border: 2px solid #45505b; padding: 10px 15px;cursor: pointer;">&nbsp;&nbsp;</a>
                            @endforeach
                            <p id="nama_warna" class="mt-3">{{$data->warna[0]->nama_warna}}</p>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="row portfolio-container">
                        <div class="col-lg-12 portfolio-item">
                            <div class="zoom_img" style="background-color: transparent;">
                                <img src="{{$baseImg.'otomotif/'.$data->detail->gambar}}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-5 my-lg-auto portfolio-item">
                    <div class="info" style="background-color: transparent;">
                        <div class="address zoom_img">
                            <a href="{{route('interiorExterior',['brand'=>Request::segment(1),'detail'=>$uri])}}" style="color: #45505b;">
                                <i class="bx bx-reset"></i>
                                <h4 style="padding-top: 10px;">Interior & Exterior 360&deg;</h4>
                            </a>
                        </div>
                        <div class="email zoom_img mt-4">
                            <a href="{{route('testDrive',['brand'=>Request::segment(1),'detail'=>$uri])}}" style="color: #45505b;">
                                <i class="bx bxs-car"></i>
                                <h4 style="padding-top: 10px;">Test Drive Virtual</h4>
                            </a>
                        </div>
                        <br>

                        <form id="form" class="php-email-form" style="background-color: transparent;">
                            <div class="phone px-5">
                                @csrf
                                <div class="form-group row mb-0">
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" required autocomplete="off" maxlength="3" style="text-align:center;" />
                                </div>
                            </div>
                            <input type="hidden" name="unit" value="{{$data->detail->id}}">
                            <input type="hidden" name="method" value="post">
                            <div class="phone zoom_img mt-2 px-5">
                                <button class="btn_round btn-block" id="cart">Tambah ke Keranjang</button>
                            </div>
                            <div class="phone zoom_img mt-2 px-5">
                                <button class="btn_round btn-block" id="buy">Beli Sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 portfolio-item">
                    <h3 class="resume-title"><small><strong>Mulai dari</strong></small>
                        <span class="text-primary">IDR {{formatRupiah($data->detail->harga)}},-</span></h3>
                    <p>{{$data->detail->deskripsi}}</p>
                </div>
                <div class="col-md-12">
                    <h3 class="resume-title">Spesifikasi</h3>
                    <div class="row">
                        @foreach($data->spesifikasi as $v)
                        <div class="col-md-6 col-lg-4 portfolio-item">
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
    $('.owl-carousel').owlCarousel({
        items: 1
        , margin: 10
        , loop: false
        , nav: false
        , dots: false
        , mouseDrag: false
        , touchDrag: false
        , autoHeight: true
    });
    $('#pilihan_warna a').click(function() {
        $('.owl-carousel').trigger('to.owl.carousel', [$(this).index()]);
        $('#nama_warna').html($(this).data('nama'));
    });
    $('#jumlah').on('change', function() {
        if ($(this).val() < 1) $(this).val('');
    });
    $('#cart').on('click', async function(e) {
        e.preventDefault();
        var form = $('#form');
        if (form.valid()) {
            $(this).prop('disabled', true);
            var data = form.serialize();
            var response = await $.post(location, data);
            $(this).prop('disabled', false);
            alert(response.msg);
            if (response.status == "success") form.trigger('reset');
        }
    });
    $('#buy').on('click', async function(e) {
        e.preventDefault();
        var form = $('#form');
        if (form.valid()) {
            $(this).prop('disabled', true);
            var data = form.serialize();
            var response = await $.post(location, data);
            $(this).prop('disabled', false);
            alert(response.msg);
            if (response.status == "success") {
                var id = btoa(JSON.stringify([response.id]));
                location.replace(`{{route('transaksiCheckout',['kd'=>generateKode(4)])}}&query=` + id);
            }
        }
    });

</script>
@endsection
