@extends('user.base')

@section('title')
- Masuk
@endsection

@section('menu')
@endsection

@section('style')
<style>
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
<div class="row h-100 m-0 p-0">
    <section id="contact" class="contact col-md-12 my-auto">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-sm-8 col-md-6 col-lg-4 mx-sm-auto mx-md-0">
                    <div class="section-title">
                        <h2>Masuk</h2>
                    </div>
                    <form id="form" class="php-email-form" style="background-color: transparent;">
                        <div class="form-group mb-1">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
                        </div>
                        <div class="form-group mb-1">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required />
                        </div>
                        <div class="text-center mt-4 mb-4"><button id="submit" class="btn_round btn-block">Masuk</button></div>
                        <p class="text-center">Belum punya akun? <a href="{{route('daftar')}}"><strong>Daftar</strong></a></p>
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
        $('#form').valid();
    });
</script>
@endsection