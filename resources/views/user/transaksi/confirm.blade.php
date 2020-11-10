@extends('user.base')

@section('title')
@endsection

@section('menu')
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
<header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
        <ul>
            <li><a href="{{route('transaksiRiwayat')}}?kdinvdg={{Request::get('kdinvdg')}}"><i class="bx bx-arrow-back"></i> <span>Kembali</span></a></li>
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
    <section id="contact" class="contact about portfolio">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="section-title">
                <h2>Konfirmasi Pembayaran</h2>
            </div>
            <div class="row">
                <div class="col-lg-8 pt-4 pt-lg-0 content portfolio-item mx-auto">
                    <form id="form" class="php-email-form mt-5" style="background-color: transparent;">
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">No. Transaksi</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kode" id="kode" placeholder="No. Transaksi" value="{{$no_transaksi}}" required readonly />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Tanggal Pembayaran</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tanggal_bayar" id="tanggal_bayar" placeholder="Tanggal Lahir" autocomplete="off" required readonly />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Nama Bank</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Nama Bank" required />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Nama Rekening</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_rekening" id="nama_rekening" placeholder="Nama Rekening" required />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Bukti Pembayaran</p>
                            <div class="col-sm-9">
                                <input type="file" name="bukti_bayar" id="bukti_bayar" style="padding-top: 8px" required />
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="zoom_img mt-4 mb-4"><button id="submit" class="btn_round">Konfirmasi</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    $(`#tanggal_bayar`).datepicker({
        format: `dd-mm-yyyy`
        , autoclose: true
        , startDate: '-7d'
    });
    $(`#tanggal_bayar`).datepicker(`update`, `{{date('d-m-Y')}}`);
    $('#submit').on('click', async function(e) {
        var breakout = false;
        e.preventDefault();
        var formData = new FormData();
        formData.append('_token', '{{csrf_token()}}');
        $.each($('#form').find('.form-control'), function() {
            formData.append($(this).attr('id'), $(this).val());
        });
        if ($('#bukti_bayar')[0].files.length != 0) {
            var bukti_bayar = $('#bukti_bayar')[0].files[0];
            var allowed_types = ["jpg", "jpeg", "png"];
            var ext = bukti_bayar.name.split(".").pop().toLowerCase();
            formData.append('bukti_bayar', bukti_bayar);
            if ($.inArray(ext, allowed_types) == -1) {
                alert("Silahkan pilih file gambar!");
                breakout = true;
            }
            if ($('#bukti_bayar')[0].files[0].size / 1048576 > 0.3) {
                alert("Ukuran file melebihi 300kB!");
                breakout = true;
            }
        }
        if (breakout) return false;
        else {
            if ($('#form').valid()) {
                $(this).prop('disabled', true);
                var response = await $.ajax({
                    type: 'post'
                    , url: location
                    , data: formData
                    , processData: false
                    , contentType: false
                });
                $(this).prop('disabled', false);
                alert(response.msg);
                if (response.status == "success") {
                    location.replace(`{{route('transaksi')}}`);
                }
            }
        }
    });

</script>
@endsection
