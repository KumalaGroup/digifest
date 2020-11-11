@extends('user.base')

@section('title')
- Daftar
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
    <section id="contact" class="contact col-md-12 my-auto">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-md-6 col-lg-8"></div>
                <div class="col-sm-8 col-md-6 col-lg-4 mx-sm-auto mx-md-0 my-auto">
                    <div class="section-title">
                        <h2>Daftar</h2>
                    </div>
                    <form id="form" class="php-email-form" style="background-color: transparent;">
                        @csrf
                        <div class="form-group mb-1">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required />
                        </div>
                        <div class="form-group mb-1">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
                        </div>
                        <div class="form-group mb-1">
                            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="No. Telepon" required />
                        </div>
                        <div class="form-group mb-1">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required minlength="6" />
                        </div>
                        <div class="form-group mb-1">
                            <input type="password" name="rePassword" class="form-control" id="rePassword" placeholder="Ulangi Password" required minlength="6" />
                        </div>
                        <div class="text-center zoom_img mt-4 mb-4"><button id="submit" class="btn_round btn-block">Daftar</button></div>
                        <p class="text-center">Sudah punya akun? <a href="{{route('login')}}"><strong>Masuk</strong></a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    $('#submit').click(function(e) {
        e.preventDefault();
        var form = $('#form');
        var data = form.serialize();
        if (form.valid()) {
            if ($('#password').val() != $('#rePassword').val()) {
                alert("Password tidak sama")
                return false;
            }
            $(this).prop('disabled', true);
            $.post(location, data, function(data, textStatus, jqXHR) {
                $('#submit').prop('disabled', false);
                alert(data.msg);
                if (data.status == "success") location.replace("{{route('login')}}");
            }, "json");
        }
    });
</script>
@endsection