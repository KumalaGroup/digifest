@extends('user.base')

@section('title')
@endsection

@section('menu')
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
<header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
        <ul>
            <li><a href="{{route('transaksi')}}"><i class="bx bx-arrow-back"></i> <span>Kembali</span></a></li>
            <br>
            <li><a href="{{route('home')}}"><i class="bx bx-home"></i> <span>Beranda</span></a></li>
            <br>
            <li><a href="{{route('profil')}}"><i class="bx bx-user"></i> <span>Profil</span></a></li>
            <li class="active"><a href="#contact"><i class="bx bxs-basket"></i> <span>Transaksi</span></a></li>
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
                                            <th>IDR {{formatRupiah($data->detail->uang_muka)}},-</th>
                                        </tr>
                                        <tr>
                                            <td width="200">Cabang Tujuan</td>
                                            <td width="20">:</td>
                                            <td>{{$data->rekening->lokasi.' - '.$data->rekening->nama_perusahaan}}</td>
                                        </tr>
                                        <tr>
                                            <td width="200">Status Pembayaran</td>
                                            <td width="20">:</td>
                                            <td>
                                                @if($data->detail->status==0)
                                                <a href="javascript:void(0)" class="badge badge-warning">Tertunda</a>
                                                @elseif($data->detail->status==1)
                                                <a href="javascript:void(0)" class="badge badge-info">Menunggu verifikasi</a>
                                                @else
                                                <a href="javascript:void(0)" class="badge badge-success">Terverifikasi</a>
                                                @endif
                                            </td>
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
                        </div>
                        @if($data->detail->status==0)
                        <div class="col-md-12 portfolio-item">
                            <h3 class="resume-title">Petunjuk Pembayaran</h3>
                            <div class="resume-item">
                                <h4 style="color:#45505b;">Silahkan melakukan pembayaran ke rekening cabang tujuan dibawah ini:</h4>
                                <table class="table table-condensed table-borderless text-left">
                                    <tbody>
                                        <tr>
                                            <td width="200">Nama Bank</td>
                                            <td width="20">:</td>
                                            <td>Bank Mandiri</td>
                                        </tr>
                                        <tr>
                                            <td width="200">Nama Pemilik Rekening</td>
                                            <td width="20">:</td>
                                            <td>{{$data->rekening->nama_perusahaan}}</td>
                                        </tr>
                                        <tr>
                                            <td width="200">No. Rekening</td>
                                            <td width="20">:</td>
                                            <td>{{$data->rekening->no_rekening}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p style="color:#45505b;"><strong>
                                        Dalam 1 x 24 jam kami tidak menerima konfirmasi pembayaran, maka kami anggap transaksi pembelian anda batal. <br>
                                        Harap untuk melakukan konfirmasi kepada kami, silahkan klik tombol dibawah untuk melakukan konfirmasi pembayaran, terima kasih.
                                    </strong></p>
                            </div>
                            <div class="form-group text-center">
                                <div class="zoom_img mt-4 mb-4"><button id="confirm" class="btn_round">Konfirmasi Pembayaran</button></div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    $('#tanggal').html(formatHariTanggal(new Date('{{$data->detail->created_at}}')));
    $('#confirm').on('click', function() {
        location.replace(`{{route('transaksiConfirm')}}?kdinvdg={{Request::get('kdinvdg')}}`);
    });
</script>
@endsection