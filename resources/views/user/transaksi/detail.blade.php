@extends('user.base')

@section('title')
@endsection

@section('menu')
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
<header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
        <ul>
            <li><a href="{{route('home')}}"><i class="bx bx-home"></i> <span>Beranda</span></a></li>
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
    .form-control[readonly] {
        background-color: #fff;
    }

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
    <section id="contact" class="contact resume about portfolio">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="section-title">
                <h2>Detail Transaksi</h2>
            </div>
            <div class="row">
                <div class="col-md-12 portfolio-item">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-condensed table-borderless text-left">
                                    <tbody>
                                        <tr>
                                            <th width="200">No. Transaksi</th>
                                            <th width="20">:</th>
                                            <th>{{$data->detail->kode}}</th>
                                        </tr>
                                        <tr>
                                            <td width="200">Tanggal</td>
                                            <td width="20">:</td>
                                            <td id="tanggal"></td>
                                        </tr>
                                        <tr>
                                            <td width="200">Nama Lengkap</td>
                                            <td width="20">:</td>
                                            <td>{{$data->detail->nama}}</td>
                                        </tr>
                                        <tr>
                                            <td width="200">Email</td>
                                            <td width="20">:</td>
                                            <td>{{$data->detail->email}}</td>
                                        </tr>
                                        <tr>
                                            <td width="200">No. Telepon</td>
                                            <td width="20">:</td>
                                            <td>{{$data->detail->telepon}}</td>
                                        </tr>
                                        <tr>
                                            <td width="200">Provinsi</td>
                                            <td width="20">:</td>
                                            <td>{{$data->detail->provinsi}}</td>
                                        </tr>
                                        <tr>
                                            <td width="200">Uang Tanda Jadi</td>
                                            <td width="20">:</td>
                                            <td>IDR {{formatRupiah($data->detail->uang_muka)}},-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3 class="resume-title">Detail Pembelian</h3>
                            <div class="table-responsive">
                                <table class="table table-condensed text-center">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data->result as $key=>$value)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ucwords($value->brand)}}</td>
                                            <td>{{$value->model}}</td>
                                            <td>{{$value->jumlah}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="form-group text-center">
                                <div class="zoom_img mt-4 mb-4"><button id="checkout" class="btn_round">Checkout</button></div>
                            </div> --}}
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
    $('#tanggal').html(formatHariTanggal(new Date('{{$data->detail->created_at}}')))

</script>
@endsection
