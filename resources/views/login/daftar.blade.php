@extends('base')

@section('title')
- Daftar
@endsection

@section('menu')
@endsection

@section('style')
<style>
    #login_container {
        width: 100%;
        height: 100vh;
        position: relative;
    }

    body {
        width: 100%;
        height: 100vh;
        background: url("{{asset('assets/img/'.$backgroundImage)}}") top right no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    body:before {
        content: "";
        background: rgba(255, 255, 255, 0.8);
        position: fixed;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    }

    .error {
        color: red;
        padding-top: 5px;
        padding-left: 5px;
        margin: 0;
        font-size: 10pt;
    }
</style>
@endsection

@section('content')
<section id="login_container" class="contact d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-md-6 col-lg-8"></div>
            <div class="col-sm-8 col-md-6 col-lg-4 mx-sm-auto mx-md-0">
                <div class="section-title">
                    <h2>Daftar</h2>
                </div>
                <form id="form" class="php-email-form" style="background-color: transparent;">
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
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required />
                    </div>
                    <div class="form-group mb-1">
                        <input type="password" name="re_password" class="form-control" id="re_password" placeholder="Ulangi Password" required />
                    </div>
                    <div class="text-center mt-4"><button id="submit" class="btn_round btn-block">Daftar</button></div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $('#submit').click(function(e) {
        e.preventDefault();
        $('#form').valid();
    });
</script>
@endsection