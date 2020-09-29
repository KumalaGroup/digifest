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
            <li class="active"><a href="#contact"><i class="bx bx-user"></i> <span>Profil</span></a></li>
            <li><a href="{{route('logout')}}"><i class="bx bx-log-out-circle"></i> <span>Keluar</span></a></li>
        </ul>
    </nav>

</header>
@endsection

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
<style>
</style>
@endsection

@section('content')
<div id="main">
    <section id="contact" class="contact about">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Profil</h2>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="row portfolio-container" data-aos="zoom-in" data-aos-delay="100">
                        <div class="col-lg-12 portfolio-item">
                            <div class="zoom_img" style="background-color: transparent;">
                                <img src="{{empty($data->gambar)?asset('assets/img/avatar.png'):$baseImg.'customer/'.$data->gambar}}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9 pt-4 pt-lg-0 content">
                    <form id="form" class="php-email-form" style="background-color: transparent;">
                        @csrf
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Nama Lengkap</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required value="{{$data->nama}}" />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Email</p>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="{{$data->email}}" />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">No. Telepon</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="No. Telepon" required value="{{$data->telepon}}" />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Tanggal Lahir</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" autocomplete="off" required readonly />
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Agama</p>
                            <div class="col-sm-9">
                                <select name="agama" id="agama" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih agama --</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Jenis Kelamin</p>
                            <div class="col-sm-9">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih jenis kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">Alamat</p>
                            <div class="col-sm-9">
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" rows="5" required>{{$data->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <p class="col-sm-3 my-auto">No. NPWP</p>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_npwp" id="no_npwp" placeholder="No. NPWP" value="{{$data->no_npwp}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <div class="mt-4 mb-4"><button id="submit" class="btn_round">Ubah</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script>
    $(`#tanggal_lahir`).datepicker({
        format: `dd-mm-yyyy`
    });
    $(`#tanggal_lahir`).datepicker(`update`, `{{$data->tanggal_lahir??date('d-m-Y')}}`);
    $(`#jenis_kelamin`).val(`{{$data->agama}}`);
    $(`#jenis_kelamin`).val(`{{$data->jenis_kelamin}}`);
</script>
@endsection