@extends('user.base')

@section('title')
- Masuk
@endsection

@section('menu')
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

    .error {
        color: red;
        padding-top: 5px;
        margin: 0;
        font-size: 10pt;
    }

</style>
@endsection

@section('content')
<div class="row h-100 m-0 p-0">
    <section id="contact" class="contact col-md-12 mt-auto">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-sm-8 col-md-6 col-lg-4 mx-sm-auto mx-md-0">
                    <div class="section-title">
                        <h2>Masuk</h2>
                    </div>
                    <form id="form" class="php-email-form" style="background-color: transparent;">
                        @csrf
                        <div class="form-group mb-1">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
                        </div>
                        <div class="form-group mb-1">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required minlength="6" />
                        </div>
                        <div class="text-center zoom_img mt-4 mb-4"><button id="submit" class="btn_round btn-block">Masuk</button></div>
                        <p class="text-center">Belum punya akun? <a href="{{route('daftar')}}"><strong>Daftar</strong></a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 mx-sm-auto mx-md-0">
                    <p style="font-size: 20px; font-weight: 500;">
                        Dapatkan <span style="color: #0c5184;">
                            <span style="font-weight: bold;">diskon 20%</span> sampai dengan
                            <span style="font-weight: bold;">IDR 500.000,-</span></span>
                        untuk setiap transaksi & berbagai hadiah menarik dengan hanya daftar dan mengikuti
                        <span style="font-weight: bold;">Kumala Digifest 2020</span>.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    $('#submit').click(async function(e) {
        e.preventDefault();
        var form = $('#form');
        var data = form.serialize();
        if ($('#form').valid()) {
            $(this).prop('disabled', true);
            var response = await $.post(location, data);
            if (response.status == "success") location.reload();
            else {
                alert(response.msg);
                $(this).prop('disabled', false);
            }
        }
    });

</script>
@endsection
