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
<style>
    .form-control[readonly] {
        background-color: #fff;
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
<div id="main">
    <section id="contact" class="contact about portfolio">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="section-title">
                <h2>Profil</h2>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="row portfolio-container">
                        <div class="col-lg-12 portfolio-item">
                            <div class="portfolio-wrap zoom_img" style="background-color: transparent;">
                                <img src="{{empty($data->gambar)?asset('assets/img/avatar.png'):$baseImg.'customer/'.$data->gambar}}" class="img-fluid" id="profilImg" alt="">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="{{empty($data->gambar)?asset('assets/img/avatar.png'):$baseImg.'customer/'.$data->gambar}}" data-gall="portfolioGallery" class="venobox" title=""><i class="bx bx-plus"></i></a>
                                        <a id="avatar" href="javascript:void(0)"><i class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9 pt-4 pt-lg-0 content portfolio-item">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="bx bx-user"></i> Personal</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="bx bx-lock"></i> Keamanan</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form id="form" class="php-email-form mt-5" style="background-color: transparent;">
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
                                <input type="file" name="gambar" id="gambar" hidden>
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <div class="mt-4 mb-4"><button id="submit" class="btn_round">Ubah</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <form id="formPass" class="php-email-form mt-5" style="background-color: transparent;">
                                @csrf
                                <div class="form-group row mb-1">
                                    <p class="col-sm-3 my-auto">Password</p>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required minlength="6" />
                                    </div>
                                </div>
                                <div class="form-group row mb-1">
                                    <p class="col-sm-3 my-auto">Ulangi Password</p>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="Ulangi Password" required minlength="6" />
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <div class="mt-4 mb-4"><button id="submitPass" class="btn_round">Ubah</button></div>
                                    </div>
                                </div>
                            </form>
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
    $(`#tanggal_lahir`).datepicker({
        format: `dd-mm-yyyy`,
        startView: 2,
        autoclose: true
    });
    $(`#tanggal_lahir`).datepicker(`update`, `{{tgl_sql($data->tanggal_lahir)}}`);
    $(`#agama`).val(`{{$data->agama}}`);
    $(`#jenis_kelamin`).val(`{{$data->jenis_kelamin}}`);

    $('#submit').click(function(e) {
        e.preventDefault();
        var form = $('#form');
        var data = form.serialize();
        if (form.valid()) {
            $(this).prop('disabled', true);
            $.post(location, data,
                function(data, textStatus, jqXHR) {
                    $('#submit').prop('disabled', false);
                    alert(data.msg);
                }, "json");
        }
    });
    $('#submitPass').click(function(e) {
        e.preventDefault();
        var form = $('#formPass');
        var data = form.serialize();
        if (form.valid()) {
            if ($('#password').val() != $('#rePassword').val()) {
                alert("Password tidak sama")
                return false;
            }
            $(this).prop('disabled', true);
            $.post(location, data,
                function(data, textStatus, jqXHR) {
                    $('#submitPass').prop('disabled', false);
                    alert(data.msg);
                    if (data.status == "success") $('#formPass').trigger('reset');
                }, "json");
        }
    });

    $('#avatar').click(function() {
        $('#gambar').click();
    });
    $('#gambar').change(function() {
        var formData = new FormData();
        formData.append('_token', '{{csrf_token()}}');
        formData.append('id', '{{$data->id}}');
        var gambar = $('#gambar')[0].files[0];
        var allowed_types = ["jpg", "jpeg", "png"];
        var ext = gambar.name.split(".").pop().toLowerCase();
        formData.append('gambar', gambar);
        if ($.inArray(ext, allowed_types) == -1) {
            alert("Silahkan pilih file gambar");
            return false;
        }
        if ($('#gambar')[0].files[0].size / 1048576 > 0.5) {
            alert("Ukuran file melebihi 500kB");
            return false;
        }
        $.ajax({
            type: 'post',
            url: location,
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                alert(response.msg);
                if (response.status == "success") $('#profilImg').attr('src', `{{$baseImg}}customer/` + response.img);
            }
        });
    });
</script>
@endsection