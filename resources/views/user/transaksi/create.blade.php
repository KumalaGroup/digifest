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
        background: url("{{$backgroundImageM}}") top no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    @media only screen and (min-device-width: 768px) {
        body {
            width: 100%;
            height: 100vh;
            background: url("{{$backgroundImageDT}}") top right no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
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
                <h2>Checkout</h2>
            </div>
            <div class="row">
                <div class="col-lg-8 pt-4 pt-lg-0 content portfolio-item mx-auto">
                    <form id="form" class="php-email-form mt-5" style="background-color: transparent;">
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Nama Lengkap</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required value="{{$data->nama}}" readonly />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Email</p>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="{{$data->email}}" readonly />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">No. Telepon</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="No. Telepon" required value="{{$data->telepon}}" readonly />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Provinsi Domisili</p>
                            <div class="col-sm-9">
                                <select name="provinsi" id="provinsi" class="form-control" required style="width:100%">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <hr class="mx-3">
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Uang Tanda Jadi</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="uang_muka" id="uang_muka" placeholder="Uang Tanda Jadi" onkeydown="input_number(event)" onkeyup="$(this).val(format_rupiah($(this).val()))" required />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Cabang Tujuan</p>
                            <div class="col-sm-9">
                                <select name="cabang_tujuan" id="cabang_tujuan" class="form-control" required style="width:100%">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <hr class="mx-3">
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Foto KTP</p>
                            <div class="col-sm-9">
                                <input type="file" name="foto_ktp" id="foto_ktp" style="padding-top: 8px" />
                            </div>
                        </div>
                        {{-- <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Foto KK</p>
                            <div class="col-sm-9">
                                <input type="file" name="foto_kk" id="foto_kk" style="padding-top: 8px" />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Foto Rekening Listrik</p>
                            <div class="col-sm-9">
                                <input type="file" name="foto_reklis" id="foto_reklis" style="padding-top: 8px" />
                            </div>
                        </div> --}}
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">No. NPWP</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_npwp" id="no_npwp" placeholder="No. NPWP" value="{{$data->no_npwp}}" />
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="zoom_img mt-4 mb-4"><button id="submit" class="btn_round">Proses</button></div>
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
    $.get(location, {
        loadData: true
    }, function(response) {
        $('#provinsi').select2({
            data: response.provinsi
            , placeholder: "-- Pilih provinsi domisili --"
            , allowClear: true
        });
        $('#cabang_tujuan').select2({
            data: response.cabang
            , placeholder: "-- Pilih cabang tujuan --"
            , allowClear: true
        });
    }, 'json');
    $('#provinsi').on('change', function() {
        $('#form').valid();
    });
    $('#cabang_tujuan').on('change', function() {
        $('#form').valid();
    });
    $('#submit').on('click', async function(e) {
        var breakout = false;
        e.preventDefault();
        var formData = new FormData();
        formData.append('_token', '{{csrf_token()}}');
        formData.append('checkout', true);
        $.each($('#form').find('.form-control'), function() {
            formData.append($(this).attr('id'), $(this).val());
        });
        if ($('#foto_ktp')[0].files.length != 0) {
            var foto_ktp = $('#foto_ktp')[0].files[0];
            var allowed_types = ["jpg", "jpeg", "png"];
            var ext = foto_ktp.name.split(".").pop().toLowerCase();
            formData.append('foto_ktp', foto_ktp);
            if ($.inArray(ext, allowed_types) == -1) {
                alert("Silahkan pilih file gambar!");
                breakout = true;
            }
            if ($('#foto_ktp')[0].files[0].size / 1048576 > 0.3) {
                alert("Ukuran file melebihi 300kB!");
                breakout = true;
            }
        }
        // if ($('#foto_kk')[0].files.length != 0) {
        //    var foto_kk = $('#foto_kk')[0].files[0];
        //   var allowed_types = ["jpg", "jpeg", "png"];
        //  var ext = foto_kk.name.split(".").pop().toLowerCase();
        //  formData.append('foto_kk', foto_kk);
        // if ($.inArray(ext, allowed_types) == -1) {
        //    alert("Silahkan pilih file gambar!");
        //   breakout = true;
        // }
        // if ($('#foto_kk')[0].files[0].size / 1048576 > 0.3) {
        //     alert("Ukuran file melebihi 300kB!");
        //    breakout = true;
        // }
        //  }
        //if ($('#foto_reklis')[0].files.length != 0) {
        //    var foto_reklis = $('#foto_reklis')[0].files[0];
        //  var allowed_types = ["jpg", "jpeg", "png"];
        // var ext = foto_reklis.name.split(".").pop().toLowerCase();
        // formData.append('foto_reklis', foto_reklis);
        // if ($.inArray(ext, allowed_types) == -1) {
        //     alert("Silahkan pilih file gambar!");
        //     breakout = true;
        // }
        // if ($('#foto_reklis')[0].files[0].size / 1048576 > 0.3) {
        //    alert("Ukuran file melebihi 300kB!");
        //    breakout = true;
        // }
        // }
        if (breakout) return false;
        else {
            if ($('#form').valid()) {
                $(this).prop('disabled', true);
                $(this).html(`<i class='bx bx-loader bx-spin'></i>`)
                var response = await $.ajax({
                    type: 'post'
                    , url: location
                    , data: formData
                    , processData: false
                    , contentType: false
                });
                $(this).prop('disabled', false);
                $(this).html(`Proses`)
                alert(response.msg);
                if (response.status == "success") {
                    var data = btoa(JSON.stringify([response.kdinvdg]));
                    location.replace(`{{route('transaksiRiwayat')}}?kdinvdg=` + data);
                }
            }
        }
    });

</script>
@endsection
